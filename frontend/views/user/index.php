<?php

use common\models\Bu;
use common\models\Position;
use dosamigos\datepicker\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('user', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1 class="page-header"><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('user', 'Create User')?></h4>
        </div>
        <div class="panel-body">
         	<?php $form = ActiveForm::begin(['method' => 'post', 'options' => ['enctype' => 'multipart/form-data']]);?>


           <div class="row">
                <div class="col-sm-6"><?=$form->field($model, 'username')->textInput(['maxlength' => true])?></div>
                <div class="col-sm-6"><?=$form->field($model, 'email')->textInput(['maxlength' => true])?></div>
            </div>

            <div class="row">
                <div class="col-sm-6"><?=$form->field($model, 'pwd')->passwordInput()?></div>
                <div class="col-sm-6"><?=$form->field($model, 'password_repeat')->passwordInput()?></div>
            </div>

            <div class="row">
                <div class="col-sm-6"><?=$form->field($model, 'fname')->textInput(['maxlength' => true])?></div>
                <div class="col-sm-6"><?=$form->field($model, 'lname')->textInput(['maxlength' => true])?></div>
            </div>


            <div class="row">
                <div class="col-sm-6">
<?php
$codeTelList = [
	"+1907" => "ALASKA (+1907)",
	"+355" => "ALBANIA (+355)",
	"+213" => "ALGERIA (+213)",
	"+376" => "ANDORRA (+376)",
	"+244" => "ANGOLA (+244)",
	"+1264" => "ANGUILLA (+1264)",
	"+1268" => "ANTIGUA AND BARBUDA (+1268)",
	"+54" => "ARGENTINA (+54)",
	"+374" => "ARMENIA (+374)",
	"+297" => "ARUBA (+297)",
	"+247" => "ASCENSION (+247)",
	"+61" => "AUSTRALIA (+61)",
	"+43" => "AUSTRIA (+43)",
	"+994" => "AZERBAIJAN REPUBLIC (+994)",
	"+351" => "AZORES (+351)",
	"+1242" => "BAHAMAS (+1242)",
	"+973" => "BAHRAIN (+973)",
	"+880" => "BANGLADESH (+880)",
	"+1246" => "BARBADOS (W.I) (+1246)",
	"+375" => "BELARUS (+375)",
	"+32" => "BELGIUM (+32)",
	"+501" => "BELIZE (+501)",
	"+229" => "BENIN (+229)",
	"+1441" => "BERMUDA (+1441)",
	"+975" => "BHUTAN (+975)",
	"+591" => "BOLIVIA (+591)",
	"+27" => "BOPUTATSWANA (+27)",
	"+387" => "BOSNIA & HERZEGOVINA, (+387)",
	"+267" => "BOTSWANA, REPUBLIC OF (+267)",
	"+55" => "BRAZIL (+55)",
	"+673" => "BRUNEI DARUSSALAM (+673)",
	"+359" => "BULGARIA (+359)",
	"+226" => "BURKINA FASO (+226)",
	"+257" => "BURUNDI (+257)",
	"+855" => "CAMBODIA (+855)",
	"+237" => "CAMEROON (+237)",
	"+1" => "CANADA (+1)",
	"+34" => "CANARY ISLAND (+34)",
	"+238" => "CAPE VERDE (+238)",
	"+1345" => "CAYMAN ISLAND (+1345)",
	"+236" => "CENTRAL AFRICAN REP. (+236)",
	"+235" => "CHAD (+235)",
	"+56" => "CHILE (+56)",
	"+86" => "CHINA (+86)",
	"+-9103" => "CHRISTMAS ISLAND (+-9103)",
	"+27" => "CISKEI (+27)",
	"+672" => "COCOS KEELING ISLAND (+672)",
	"+57" => "COLOMBIA (+57)",
	"+269" => "COMOROS (+269)",
	"+242" => "CONGO (+242)",
	"+682" => "COOK ISLAND (+682)",
	"+506" => "COSTA RICA (+506)",
	"+225" => "COTE D'IVOIRE (+225)",
	"+385" => "CROATIA (+385)",
	"+53" => "CUBA (+53)",
	"+357" => "CYPRUS (+357)",
	"+420" => "CZECH REPUBLIC (+420)",
	"+45" => "DENMARK (+45)",
	"+246" => "DIEGO GARCIA (+246)",
	"+253" => "DJIBOUTI (+253)",
	"+-766" => "DOMINICAN REPUBLIC (+-766)",
	"+-766" => "DOMNICA ISLAND (+-766)",
	"+593" => "ECUADOR (+593)",
	"+20" => "EGYPT (+20)",
	"+503" => "EL SALVADOR (+503)",
	"+240" => "EQUATORIAL GUINEA (+240)",
	"+291" => "ERITREA (+291)",
	"+372" => "ESTONIA (+372)",
	"+251" => "ETHIOPIA (+251)",
	"+500" => "FALKLAND ISLAND (+500)",
	"+298" => "FAROE ISLAND (+298)",
	"+679" => "FIJI REPUBLIC (+679)",
	"+358" => "FINLAND (+358)",
	"+594" => "FR.GUINEA (+594)",
	"+689" => "FR.POLYNESIA (+689)",
	"+33" => "FRANCE (+33)",
	"+241" => "GABONESE REPUBLIC (+241)",
	"+220" => "GAMBIA (+220)",
	"+995" => "GEORGIA (+995)",
	"+49" => "GERMANY (+49)",
	"+233" => "GHANA (+233)",
	"+350" => "GIBRALTAR (+350)",
	"+30" => "GREECE (+30)",
	"+299" => "GREENLAND (+299)",
	"+-472" => "GRENADA (+-472)",
	"+590" => "GUADELOUPE (+590)",
	"+671" => "GUAM (+671)",
	"+502" => "GUATEMALA (+502)",
	"+224" => "GUINEA (+224)",
	"+245" => "GUINEA BISSAU (+245)",
	"+592" => "GUYANA (+592)",
	"+509" => "HAITI (+509)",
	"+-807" => "HAWAII (+-807)",
	"+504" => "HONDURAS (+504)",
	"+852" => "HONG KONG (+852)",
	"+36" => "HUNGARY (+36)",
	"+354" => "ICELAND (+354)",
	"+62" => "INDONESIA (+62)",
	"+98" => "IRAN (+98)",
	"+964" => "IRAQ (+964)",
	"+353" => "IRELAND (+353)",
	"+972" => "ISRAEL (+972)",
	"+39" => "ITALY (+39)",
	"+-875" => "JAMAICA (+-875)",
	"+81" => "JAPAN (+81)",
	"+962" => "JORDAN HASHEMITE (+962)",
	"+7" => "KAZAKHSTAN (+7)",
	"+254" => "KENYA (+254)",
	"+996" => "KYRGYZSTAN (+996)",
	"+686" => "KIRIBATI (+686)",
	"+850" => "KOREA (NORTH) (+850)",
	"+82" => "KOREA (SOUTH) (+82)",
	"+965" => "KUWAIT, STATE OF (+965)",
	"+856" => "LAOS (+856)",
	"+371" => "LATVIA (+371",
	"+961" => "LEBANON (+961)",
	"+266" => "LESOTHO (+266)",
	"+231" => "LIBERIA (+231)",
	"+218" => "LIBYA (+218)",
	"+423" => "LICHTENSTEIN (+423)",
	"+370" => "LITHUANIA (+370)",
	"+352" => "LUXEMBORG (+352)",
	"+853" => "MACAO (+853)",
	"+389" => "MACEDONIA (+389)",
	"+261" => "MADAGASCAR (+261)",
	"+351" => "MADEIRA ISLAND (+351)",
	"+265" => "MALAWI (+265)",
	"+60" => "MALAYSIA (+60)",
	"+960" => "MALDIVES (+960)",
	"+223" => "MALI (+223)",
	"+356" => "MALTA (+356)",
	"+670" => "MARIANA ISLAND (+670)",
	"+692" => "MARSHAL ISLAND (+692)",
	"+596" => "MARTINIQUE (+596)",
	"+222" => "MAURITANIA (+222)",
	"+230" => "MAURITIUS (+230)",
	"+269" => "MAYOTTE (+269)",
	"+52" => "MEXICO (+52)",
	"+691" => "MICRONESIA (+691)",
	"+373" => "MOLDOVA (+373)",
	"+377" => "MONACO (+377)",
	"+976" => "MONGOLIA (+976)",
	"+1664" => "MONTSERRAT (+1664)",
	"+212" => "MOROCCO (+212)",
	"+258" => "MOZAMBIQUE (+258)",
	"+95" => "MYANMAR (+95)",
	"+264" => "NAMIBIA (+264)",
	"+674" => "NAURU (+674)",
	"+977" => "NEPAL (+977)",
	"+31" => "NETHERLANDS (+31)",
	"+599" => "NETHERLANDS ANTILLES (+599)",
	"+687" => "NEW CALEDONIA (+687)",
	"+64" => "NEW ZEALAND (+64)",
	"+505" => "NICARAGUA (+505)",
	"+227" => "NIGER (+227)",
	"+234" => "NIGERIA (+234)",
	"+683" => "NIUE ISLAND (+683)",
	"+47" => "NORWAY (+47)",
	"+968" => "OMAN (+968)",
	"+92" => "PAKISTAN (+92)",
	"+680" => "PALAU (+680)",
	"+970" => "PALESTINE (+970)",
	"+507" => "PANAMA (+507)",
	"+675" => "PAPUA NEW GUINEA (+675)",
	"+595" => "PARAGUAY (+595)",
	"+51" => "PERU (+51)",
	"+63" => "PHILIPPINES (+63)",
	"+48" => "POLAND (+48)",
	"+351" => "PORTUGAL (+351)",
	"+1787" => "PUERTO RICO (+1787)",
	"+974" => "QATAR (+974)",
	"+262" => "REUNION (+262)",
	"+230" => "RODRIGUES ISLAND (+230)",
	"+40" => "ROMANIA (+40)",
	"+7" => "RUSSIAN FEDERATION (+7)",
	"+250" => "RWANDESE REPUBLIC (+250)",
	"+684" => "SAMOA AMERICAN (+684)",
	"+685" => "SAMOA WESTERN (+685)",
	"+378" => "SAN MARINO (+378)",
	"+239" => "SAO TOME & PRINCIPE (+239)",
	"+966" => "SAUDI ARABIA (+966)",
	"+221" => "SENEGAL (+221)",
	"+248" => "SEYCHELLES (+248)",
	"+232" => "SIERRA LEONE (+232)",
	"+65" => "SINGAPORE (+65)",
	"+421" => "SLOVAK REPUBLIC (+421)",
	"+386" => "SLOVENIA (+386)",
	"+677" => "SOLOMON ISLAND (+677)",
	"+252" => "SOMALIA DEMOCRATIC REP. (+252)",
	"+27" => "SOUTH AFRICA (+27)",
	"+34" => "SPAIN (+34)",
	"+94" => "SRI LANKA (+94)",
	"+290" => "ST.HELENA (+290)",
	"+1869" => "ST.KITTS - NEVIS (+1869)",
	"+1758" => "ST.LUCIA (+1758)",
	"+508" => "ST.PIERRE & MIQUELON (+508)",
	"+1809" => "ST.VINCENT & THE GRENADINES (+1809)",
	"+249" => "SUDAN (+249)",
	"+597" => "SURINAME (+597)",
	"+268" => "SWAZILAND (+268)",
	"+46" => "SWEDEN (+46)",
	"+41" => "SWITZERLAND (+41)",
	"+963" => "SYRIA (+963)",
	"+992" => "TAJIKISTAN (+992)",
	"+886" => "TAIWAN (+886)",
	"+255" => "TANZANIA (+255)",
	"+66" => "THAILAND (+66)",
	"+228" => "TOGOLESE REPUBLIC (+228)",
	"+676" => "TONGA (+676)",
	"+27" => "TRANSKEI (+27)",
	"+1868" => "TRINIDAD & TOBAGO (+1868)",
	"+216" => "TUNISIA (+216)",
	"+90" => "TURKEY (+90)",
	"+993" => "TURKMENISTAN (+993)",
	"+1649" => "TURKS & CAICOS ISLAND (+1649)",
	"+688" => "TUVALU (+688)",
	"+256" => "UGANDA (+256)",
	"+380" => "UKRAINE (+380)",
	"+971" => "UNITED ARAB EMIRATES (+971)",
	"+44" => "UNITED KINGDOM (+44)",
	"+1" => "UNITED STATES OF AMERICA (+1)",
	"+598" => "URUGUAY (+598)",
	"+998" => "UZBEKISTAN (+998)",
	"+678" => "VANUATU (+678)",
	"+39" => "VATICAN CITY STATE (+39)",
	"+27" => "VENDA (+27)",
	"+58" => "VENEZUELA (+58)",
	"+84" => "VIETNAM (+84)",
	"+339" => "VIRGIN ISLAND (A) (+339)",
	"+283" => "VIRGIN ISLAND (B) (+283)",
	"+681" => "WALLIS & FUTUNA ISLAND (+681)",
	"+967" => "YEMEN (SANA'A) (+967)",
	"+381" => "YUGOSLAVIA (+381)",
	"+243" => "ZAIRE (+243)",
	"+260" => "ZAMBIA (+260)",
	"+263" => "ZIMBABWE (+263)",
];?>
<?=$form->field($model, 'tel_code')->dropDownList($codeTelList, [
	'prompt' => Yii::t('main', '... Select ...'),
])?>

                    </div>
                <div class="col-sm-6"><?=$form->field($model, 'tel_m')->textInput(['maxlength' => true])?></div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                	<?php
if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
	$teamList = ArrayHelper::map(Bu::find()->where(['company_id' => Yii::$app->user->identity->company->id])->all(), 'id', 'bu_name');
} else {
	$teamList = [];
}
?>
                	<?=$form->field($model, 'bu_id')->dropDownList($teamList, [
	'prompt' => Yii::t('main', '... Select ...'),
])?></div>

                <div class="col-sm-6"> <?php
if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
	$positionList = ArrayHelper::map(Position::find()->where(['company_id' => Yii::$app->user->identity->company->id])->all(), 'id', 'postion_name');
} else {
	$positionList = [];
}
?>
                    <?=$form->field($model, 'postion_id')->dropDownList($positionList, [
	'prompt' => Yii::t('main', '... Select ...'),
])?></div>
            </div>

            <div class="row">
                <div class="col-sm-6"><?php
$statusList = [
	0 => 'Banned',
	1 => 'Active',
];?>
                	<?=$form->field($model, 'status')->dropDownList($statusList, [
	'prompt' => Yii::t('main', '... Select ...'),
])?>
<?=$form->field($model, 'imageFile')->fileInput()?>
                     </div>
                <div class="col-sm-6">
<?=$form->field($model, 'birth_date')->widget(
	DatePicker::className(), [
		// 'inline' => true,
		// 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
		'template' => '{addon}{input}',
		'clientOptions' => [
			'autoclose' => true,
			'format' => 'yyyy-mm-dd',
			'endDate' => date('Y-m-d'),
			// 	// 'startDate' => date('Y-m-d', strtotime('+1 day')),
		],
	]);
?>
</div>
            </div>

            <div class="row">
            	<div class="col-sm-6"></div>
            	<div class="col-sm-6"></div>
            </div>

            <div class="form-group">
                <?=Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-primary'])?>
            </div>

            <?php ActiveForm::end();?>
        </div>
    </div>
    <?php if (Yii::$app->session->hasFlash('alert')): ?>
        <?=\yii\bootstrap\Alert::widget([
	'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
	'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
])?>
    <?php endif;?>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('user', 'List User')?></h4>
        </div>
        <div class="panel-body">
                <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		[
			'attribute' => 'pic_url',
			'format' => 'raw',
			'value' => function ($model) {
				if (isset($model->pic_url)) {
					return Html::img($model->pic_url);
				}
			},
			'contentOptions' => ['style' => 'width:70px;'],
		],
		// 'id',
		// 'company_id',
		'username',
		'fname',
		// 'lname',
		// 'pwd',
		// 'postion_id',
		[
			'attribute' => 'postion_id',
			// 'attribute' => 'cust_type_id',
			// 'attribute' => Yii::t('order', 'Status'),
			'format' => 'raw',
			'value' => function ($model) {
				if (isset($model->position->postion_name)) {
					return $model->position->postion_name;
				}
				return '-';
			},
		],
		// 'org_id',
		'email:email',
		// 'tel_m',
		// 'pic_url:url',
		// 'user_type_id',
		// 'cr_date',
		// 'cr_by',
		// 'upd_date',
		// 'upd_by',
		// 'guid',
		// 'status',
		// 'active_date',
		// 'expire_date',
		// 'tel_code',
		// 'birth_date',
		// 'bu_id',
		// 'users_typecom',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
        </div>
    </div>
</div>
