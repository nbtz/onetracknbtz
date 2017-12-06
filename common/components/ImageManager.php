<?php

namespace common\components;

use Aws\S3\Enum\CannedAcl;
use Yii;
use yii\helpers\Inflector;
use yii\imagine\Image;

class ImageManager {
	// ยังไม่ได้เซตขนาด
	const MAX_WIDTH = 1024;
	const TMB_EXTRA_SMALL = '30x30';
	const TMB_SMALL = '100x100'; // 120*120 150*150
	const TMB_MEDIUM = '400x400';
	// const TMB_BIG = '555x350';

	// public static $thumb_path = '@frontend/web/uploads/thumbs';
	// public static $origins_path = '@frontend/web/uploads/origins';
	public static $source_path;
	public static $file_name;

	public static function generateThumbnail($size) {
		// $thumb_name = self::getThumbnailName($size);
		list($w, $h) = explode("x", $size);
		// $save_dir = Yii::getAlias(self::$thumb_path) . DIRECTORY_SEPARATOR . 'tmb_' . $size . '_' . self::$file_name;
		$save_dir = Yii::getAlias('@runtime' . DIRECTORY_SEPARATOR . 'tmb_' . $size . '_' . self::$file_name);

		Image::thumbnail(self::$source_path, $w, $h)
			->save($save_dir);

		return $save_dir;
	}

	public static function getThumbnailName($size) {
		list($w, $h) = explode("x", $size);
		return 'tmb_' . $size . '_' . $this->name;
	}

	public static function generateFileName($file) {
		$fileName = substr(uniqid(md5(rand()), true), 0, 10);
		$fileName .= '-' . Inflector::slug($file->baseName);
		$fileName .= '.' . $file->extension;
		self::$file_name = $fileName;
		return $fileName;
	}

	public static function saveOriginImage($file) {
		// $save_dir = Yii::getAlias(self::$origins_path) . DIRECTORY_SEPARATOR . self::$file_name;
		$save_dir = Yii::getAlias('@runtime' . DIRECTORY_SEPARATOR . self::$file_name);
		Yii::info("Image save origin path :: ");
		Yii::info($save_dir);

		$file->saveAs($save_dir, true);
		return $save_dir;
	}

	public static function save($file, $thumb = true) {

		Yii::info("Image save file :: ");
		Yii::info($file);

		self::$source_path = $file->tempName;

		$file_name = self::generateFileName($file);

		if ($thumb) {
			// self::generateThumbnail(self::TMB_BIG);
			$tmb_medium = self::generateThumbnail(self::TMB_MEDIUM);
			$tmb_extra_small = self::generateThumbnail(self::TMB_EXTRA_SMALL);
			$tmb_small = self::generateThumbnail(self::TMB_SMALL);
		}

		$original = self::saveOriginImage($file);

		Yii::info("original");
		Yii::info($original);

		$manager = \Yii::$app->resourceManager;
		Yii::info("manager");
		Yii::info($manager);

		Yii::info("manager->bucket");
		Yii::info($manager->bucket);
		Yii::info("file_name");
		Yii::info($file_name);

		$options = [
			'Bucket' => $manager->bucket,
			'Key' => 'images/' . $file_name,
			'SourceFile' => $original,
			'ACL' => CannedAcl::PUBLIC_READ,
		];
		Yii::info("options");
		Yii::info($options);
		$manager->getClient()->putObject($options);

		Yii::info("options origin");

		$options['Key'] = 'images/thumbs/' . basename($tmb_small);
		$options['SourceFile'] = $tmb_small;
		$manager->getClient()->putObject($options);

		Yii::info("options small");

		$options['Key'] = 'images/thumbs/' . basename($tmb_extra_small);
		$options['SourceFile'] = $tmb_extra_small;
		$manager->getClient()->putObject($options);
		Yii::info("options extra small");

		$options['Key'] = 'images/thumbs/' . basename($tmb_medium);
		$options['SourceFile'] = $tmb_medium;
		$manager->getClient()->putObject($options);
		Yii::info("options medium");

		/* $options['Key'] = 'images/thumbs/'.basename($tmb_big);
			        $options['SourceFile'] = $tmb_big;
		*/

		@unlink($original);
		@unlink($tmb_small);
		@unlink($tmb_extra_small);
		@unlink($tmb_medium);
		// @unlink($tmb_big);

		Yii::info("before return");
		// Yii::info("file_name");
		// Yii::info($file_name);
		return self::$file_name;
	}
}