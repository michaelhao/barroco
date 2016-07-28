<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(ENVIRONMENT != "development") {
            echo '請勿再正式環境下執行 Migrate!!';
        } else {
            $this->load->library('migration');
        }   
    }

    public function index()
    {
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        } else {
        	echo $this->migration->current();
        }
    }

    public function init()
    {
        $this->migration->version(0);
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        } else {
            echo $this->migration->current();
            $this->seeding();
        }
    }


    public function seeding() {
        // Admintable
        $insert_sql = <<<EOT
INSERT INTO `admintable` (`id`, `name`, `acc`, `pwd`, `pic`, `email`, `title`, `time`, `right`, `Recover`) VALUES
(1, 'admin', 'admin', '25f9e794323b453885f5181f1b624d0b', '', 'sheilawong@fff.com', '1', '2014-07-09', 1, 0);
EOT;
        $query = $this->db->query($insert_sql);


        // Admintype
        $insert_sql = <<<EOT
INSERT INTO `admintype` (`id`, `name`) VALUES(1, '最高管理者'),(2, '執行者');
EOT;
        $query = $this->db->query($insert_sql);

        // Backadmin
        $insert_sql = <<<EOT
INSERT INTO `backadmin` (`id`, `webname`, `webtitle`, `keyword`, `description`, `email`, `copyright`, `tel`, `address`, `shipment`, `free_shipment`) VALUES
(1, '元佬麵團', '元佬麵團', '元佬麵團關鍵字', '元佬麵團描述', 'Im141313@gmail.com', 'Copyright &copy; 2015. Created with by 三田九實. All Rights Reserved.', ' (03) 450-3135', '桃園市中壢區龍岡路三段301號o', '100', '1000');
EOT;
        $query = $this->db->query($insert_sql);

        // Backmainmenu
        $insert_sql = <<<EOT
INSERT INTO `backmainmenu` (`id`, `name`, `link`, `listpage`, `insertpage`, `modifypage`, `recoverpage`, `typepage`, `showhide`, `admintype1_permission`, `admintype2_permission`, `admintype3_permission`, `sort`) VALUES
(1, '首頁', 'page', 'list.php', 'insert.php', 'modify.php', '', '', 1, 1, 1, 1, 1),
(2, '管理員管理', 'page', 'adminlist.php', 'admininsert.php', 'adminmodify.php', 'adminrecover.php', '', 1, 1, 0, 0, 2),
(3, '類別管理', 'page', 'typelist.php', 'typeinsert.php', 'typemodify.php', 'typerecover.php', '', 1, 1, 0, 0, 3),
(4, '媒體報導', 'page', 'bloglist.php', 'bloginsert.php', 'blogmodify.php', 'blogrecover.php', '', 1, 1, 0, 0, 10),
(5, '靜態頁面', 'page', 'staticlist.php', 'staticinsert.php', 'staticmodify.php', 'articlerecover.php', '', 1, 1, 0, 0, 7),
(6, '訂單管理', 'page', 'orderlist.php', 'orderinsert.php', 'ordermodify.php', 'orderrecover.php', '', 1, 1, 0, 1, 3),
(7, '會員管理', 'page', 'userlist.php', 'userinsert.php', 'usermodify.php', 'userrecover.php', '', 1, 1, 0, 0, 3),
(8, '首頁輪播', 'page', 'carouse_index_list.php', 'carouse_index_insert.php', 'carouse_index_modify.php', 'articlerecover.php', '', 1, 1, 0, 0, 4),
(9, '最新消息', 'page', 'newslist.php', 'newsinsert.php', 'newsmodify.php', 'articlerecover.php', '', 1, 1, 0, 0, 6),
(10, '活動下載', 'page', 'promotionslist.php', 'promotionsinsert.php', 'promotionsmodify.php', 'promotionsrecover.php', '', 1, 1, 0, 0, 6),
(11, '線上訂購', 'page', 'productlist.php', 'productinsert.php', 'productmodify.php', 'productrecover.php', 'update_excel.php', 1, 1, 1, 0, 10),
(12, '分店查詢', 'page', 'storelist.php', 'storeinsert.php', 'storemodify.php', 'storerecover.php', '', 1, 1, 0, 1, 10),
(13, '聯絡表單管理', 'page', 'contactuslist.php', '', '', 'articlerecover.php', '', 1, 1, 0, 0, 13),
(14, '訂單細項管理', 'page', 'orderlist.php', 'orderdetailinsert.php', 'orderdetailmodify.php', 'orderdetailrecover.php', '', 0, 1, 0, 1, 3),
(15, '元老傳承管理', 'page', 'historylist.php', 'historyinsert.php', 'historymodify.php', 'articlerecover.php', '', 1, 1, 0, 0, 15),
(16, '優惠管理', 'page', 'special_offers_list.php', 'special_offers_insert.php', 'special_offers_modify.php', 'articlerecover.php', '', 1, 1, 0, 0, 15),
(17, '實體介面帳號', 'page', 'store_account_list.php', 'store_account_insert.php', 'store_account_modify.php', 'articlerecover.php', '', 1, 1, 0, 0, 15),
(18, '待審黃金區', 'page', 'verify_vip_list.php', 'verify_vip_insert.php', 'verify_vip_modify.php', 'articlerecover.php', '', 1, 1, 0, 0, 15),
(19, '生日禮兌換', 'page', 'birthdaylist.php', 'birthdayinsert.php', 'birthdaymodify.php', 'articlerecover.php', '', 1, 1, 0, 0, 15),
(20, '電子報', 'page', 'edmlist.php', 'edminsert.php', 'edmmodify.php', 'articlerecover.php', '', 1, 1, 0, 0, 15);
EOT;
        $query = $this->db->query($insert_sql);

        // Config
        $insert_sql = <<<EOT
INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+30 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('ite_password_reset_page', 'reset'),
('password_min_score', '3'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'catxii@gmail.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', '元佬麵團'),
('site_timezone', 'Asia/Taipei'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '1'),
('smtp_auth', '1'),
('smtp_host', 'smtp.gmail.com'),
('smtp_password', '5j4zj6su3'),
('smtp_port', '465'),
('smtp_security', 'ssl'),
('smtp_username', 'falcoinno.email@gmail.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '6');
EOT;
        $query = $this->db->query($insert_sql);

        // Type
        $insert_sql = <<<EOT
INSERT INTO `type` (`id`, `panel`, `parent_id`, `name`, `name_en`, `created_at`, `updated_at`, `sort`, `recover`) VALUES
(1, 3, 0, '產品管理', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 3, 0, '媒體報導', '', '0000-00-00 00:00:00', '2016-04-21 10:27:18', 0, 0),
(3, 3, 1, '德國麵團系列', '', '0000-00-00 00:00:00', '2016-04-21 10:27:18', 0, 0),
(4, 3, 1, '特級麵團系列', '', '0000-00-00 00:00:00', '2016-04-21 10:27:18', 0, 0),
(5, 3, 1, '飲品系列', '', '0000-00-00 00:00:00', '2016-04-21 10:27:18', 0, 0),
(6, 3, 1, '咖啡系列', '', '0000-00-00 00:00:00', '2016-04-21 10:27:18', 0, 0),
(7, 3, 1, '有機飲品', '', '0000-00-00 00:00:00', '2016-05-19 13:00:28', 0, 0),
(8, 3, 2, '電視報導', '', '0000-00-00 00:00:00', '2016-05-19 13:00:28', 0, 0),
(9, 3, 2, '平面報導', '', '0000-00-00 00:00:00', '2016-05-19 13:00:28', 0, 0),
(10, 3, 2, '網路媒體', '', '0000-00-00 00:00:00', '2016-05-19 13:00:28', 0, 0);

EOT;
        $query = $this->db->query($insert_sql);

        // Static
        $insert_sql = <<<EOT
INSERT INTO `static` (`id`, `panel`, `lang`, `name`, `pic`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `description`, `content`, `updated_at`, `show`, `field1`, `field2`, `field3`, `field4`, `field5`) VALUES
(1, 5, 1, '加盟專區', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 1, '', '', '', '', ''),
(2, 5, 1, '常見問題', '', '', '', '', '', '', NULL, '<h3>\r\n   常見問題：</h3>\r\n<p>\r\n   付款方式<br />\r\n  『元佬麵團網路購物』 使用安全的「歐付寶」金流系統，目前提供付款方式有兩種：<br />\r\n    <br />\r\n  1.【ATM轉帳】<br />\r\n 完成訂購流程後，系統會自動產出一組專屬匯款帳號，請在指定時間內完成轉帳即可。<br />\r\n    <br />\r\n  2.【線上刷卡】<br />\r\n  完成訂購流程後，系統會自動跳到刷卡頁面； 若刷卡失敗，此筆訂單會顯示付款失敗，將會自動取消訂單，您必須要重新操作購物流程。(如遇同一張信用卡一直刷卡不過的情形，建議請立即與您的信用卡公司聯繫，並更換其他張信用卡刷卡，或將付款方式改為貨到付款或是ATM轉帳。)<br />\r\n <br />\r\n  付款成功後，將會收到系統發出的「付款成功-通知信」，即完成付款流程。<br />\r\n    <br />\r\n  ※ 我們不會主動連絡客戶分期付款，請小心詐騙。<br />\r\n   <br />\r\n  <br />\r\n  運費計算<br />\r\n  <br />\r\n  1.單筆訂單滿999元享免運優惠；未滿999元運費酌收80元。(外島地區運費一律200元)<br />\r\n <br />\r\n  2.完成訂購後，若要另外加購享同筆運費，請盡快與我們連繫。<br />\r\n <br />\r\n  備註：若直接下單，系統則會產生二次運費。<br />\r\n  <br />\r\n  <br />\r\n  配送方式<br />\r\n  <br />\r\n  1.目前提供「宅配送到指定地址」與「便利商店取件」兩種服務，<br />\r\n    <br />\r\n  2.今天下單，隔日出貨，一般為1~2天即可收到。<br />\r\n  <br />\r\n  ※ 例假日順延。<br />\r\n  <br />\r\n  <br />\r\n  其他問題<br />\r\n  ● 產品的商品保存期限?<br />\r\n  依產品不同，包裝上標示製造日期與保存期限。<br />\r\n <br />\r\n  ● 所有產品都有分葷素嗎？<br />\r\n 是的，您可查閱線上訂購產品頁面標示。<br />\r\n    <!-- <h5 class="title-ct">資料待提供</h5> --><!-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et.</p>\r\n                        <div class="block-contactinfo">\r\n                            <h6>G2F</h6>\r\n                            <p>客服專線  : 02-8792-2770<br>\r\n\r\n傳真  : 02-8792-2110<br>\r\n\r\nE-mail : g2fscs@g2fgroup.net<br>\r\n\r\n地址  : 114 台北市內湖區石潭路 27 號</p>\r\n                        </div>\r\n                        <div class="block-contactinfo">\r\n                            <h6>BENZ HEADQUATER</h6>\r\n                            <p>PO Box 16122 Collins Street West<br>\r\n                            Victoria 8007<br>\r\n                            Australia</p>\r\n                        </div> --></p>\r\n', '2016-06-17 21:19:59', 1, NULL, NULL, NULL, NULL, NULL),
(3, 5, 1, '人才招募', '', '', '', '', '', '', NULL, '<h3>\r\n   職務說明</h3>\r\n<h5>\r\n   工作內容：</h5>\r\n<p>\r\n   1、具備服務技巧相關經驗，有承擔力、執行力、口才技巧兼備。<br />\r\n 2、須對食品有興趣，願意不斷充實提升自己。<br />\r\n 3、劇本基本知識與技能，進而提升全員士氣達到績效。<br />\r\n 4、部門人才招募，新人教育訓練。<br />\r\n  5、參與公司經營策略，產品行銷策略等工作。</p>\r\n<p>\r\n    &nbsp;</p>\r\n<h5>\r\n  職務類別：</h5>\r\n<p>\r\n   櫃台收銀人員/外場服務人員</p>\r\n<p>\r\n    &nbsp;</p>\r\n<h5>\r\n  需求人數：</h5>\r\n<p>\r\n   2人</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  薪資待遇：</h5>\r\n<p>\r\n   面議</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  工作性質：</h5>\r\n<p>\r\n   全職</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  身份類別：</h5>\r\n<p>\r\n   一般求職者、中高齡者、二度就業</p>\r\n<p>\r\n  &nbsp;</p>\r\n<h5>\r\n  是否出差：</h5>\r\n<p>\r\n   不需出差/外派</p>\r\n<p>\r\n  &nbsp;</p>\r\n<h5>\r\n  管理責任：</h5>\r\n<p>\r\n   管理1-3人</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  可上班日：</h5>\r\n<p>\r\n   不限</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  休假制度：</h5>\r\n<p>\r\n   週休二日</p>\r\n<p>\r\n &nbsp;</p>\r\n<h5>\r\n  上班時段：</h5>\r\n<p>\r\n   日班 上班時段：09:00/下班時段: 18:00</p>\r\n<p>\r\n    &nbsp;</p>\r\n<h5>\r\n  上班地點：</h5>\r\n<p>\r\n   台北市和平東路二段18-9號</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  工作經驗：</h5>\r\n<p>\r\n   1年以上</p>\r\n<p>\r\n &nbsp;</p>\r\n<h5>\r\n  學歷要求：</h5>\r\n<p>\r\n   不拘</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  語文條件：</h5>\r\n<p>\r\n   不拘</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  方言條件：</h5>\r\n<p>\r\n   台語 : 很好</p>\r\n<p>\r\n  &nbsp;</p>\r\n<h5>\r\n  擅長工具：</h5>\r\n<p>\r\n   Word、Excel</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  工作技能：</h5>\r\n<p>\r\n   不拘</p>\r\n<p>\r\n   &nbsp;</p>\r\n<h5>\r\n  其他條件：</h5>\r\n<p>\r\n   職缺特色<br />\r\n  週休二日準時上下班提供加班費獎金分紅機制<br />\r\n  應徵方式</p>\r\n<p>\r\n &nbsp;</p>\r\n<h5>\r\n  職務聯絡人：</h5>\r\n<p>\r\n  張小姐</p>\r\n<p>\r\n  &nbsp;</p>\r\n<h5>\r\n  電　　　洽：</h5>\r\n<p>\r\n  (02)XXXXXXX<br />\r\n   其他應徵方式及備註：<br />\r\n    請先來電預約面試時間，勿直接前來，謝謝。<br />\r\n  &nbsp;</p>\r\n', '2016-06-17 21:21:00', 1, NULL, NULL, NULL, NULL, NULL);
EOT;

        $query = $this->db->query($insert_sql);

        // User
        $password = '$2y$10$Ldy3OWVlZxGOo6k1QXMZy.cRxBHAgxwRlWAJRFV3VYy4tiV14O69q';
        $insert_sql = <<<EOT
INSERT INTO `users` (`id`, `email`, `account`, `password`, `name`, `phone`, `identity`, `address`, `birthday`, `member_level`, `verify`, `verify_number`, `register_from`, `gold`, `bonus`, `bir_gift`, `isactive`, `dt`, `updated_at`) VALUES
(1, 'catxii@gmail.com', 'catxii', '$password', 'Ian Lin', '0975191507', 'A111111111', '基隆市中山區中和路', '2000-01-01', 0, 0, 0, 'website', 0, 0, 0, 1, '2016-05-18 04:21:13', '2016-05-18 04:21:13'),
(2, 'aaa@gmail.com', 'aaa', '$password', 'Lin', '0975191507', 'A111111111', '基隆市中山區中和路', '2000-06-01', 0, 0, 0, 'website', 0, 0, 0, 1, '2016-05-18 04:21:13', '2016-05-18 04:21:13');
EOT;
        $query = $this->db->query($insert_sql);

        // Product
        $insert_sql = <<<EOT
INSERT INTO `product` (`id`, `panel`, `type`, `number`, `kind`, `name`, `pic`, `pay_method`, `transport_method`, `visitor`, `description`, `content`, `start_at`, `end_at`, `created_at`, `updated_at`, `recover`, `sort`, `show`, `hot`, `price`, `special_offer`, `qty`) VALUES
(1, 11, 11, 0, 1, '(訂製專區) 白色免螺絲角鋼 收納層架櫃專用', NULL, ' 銀行或郵局轉帳，貨到付款', '貨運/宅配', '', NULL, '<p>\r\n   <img alt="" class="m_bottom_13" src="../../public/site/images/p_image1.png" /> <img alt="" class="m_bottom_13" src="../../public/site/images/p_image2_else.jpg" /></p>\r\n<p class="second_font m_bottom_13">\r\n   ★白色免螺絲 角鋼 為A.項商品</p>\r\n<p>\r\n <img alt="" class="m_bottom_13" src="../../public/site/images/p_image3_else.jpg" /> <img alt="" class="m_bottom_13" src="../../public/site/images/p_image4_else.gif" /> <img alt="" class="m_bottom_13" src="../../public/site/images/p_image5_else.jpg" /> <img alt="" class="m_bottom_13" src="../../public/site/images/p_image6_else.jpg" /> <img alt="" class="m_bottom_13" src="../../public/site/images/p_image7_else.jpg" /></p>\r\n<p class="second_font m_bottom_13">\r\n  ★在運送或自行組裝過程中，難免會有些許脫漆情形 若有以上情形皆屬正常現象</p>\r\n<p class="second_font m_bottom_13">\r\n 角鋼估價請複製:</p>\r\n<p class="second_font m_bottom_13">\r\n 白色免螺絲 角鋼：<br />\r\n 長＿尺，高＿尺，深＿尺，共＿層(每層補強＿支)<br />\r\n   附＿mm木板，木板種類＿，總共＿座<br />\r\n 運送至＿縣市＿鄉鎮</p>\r\n<p class="second_font m_bottom_13">\r\n    個人因素退貨，買家須自付退貨商品寄回郵資；退款金額將不含商品寄回郵資 ，敬請見諒！</p>\r\n<p class="second_font m_bottom_13">\r\n    有任何問題或不了解的地方都歡迎發問！！</p>\r\n<p>\r\n  <img alt="" class="m_bottom_13" src="../../public/site/images/p_image8_else.gif" /> <img alt="" class="m_bottom_13" src="../../public/site/images/p_image9_else.jpg" /></p>\r\n<p class="second_font m_bottom_13">\r\n  萬能角鋼、免螺絲角鋼、鋁合金架、狗籠、各式不鏽鋼、角鋼架、免螺絲角鋼架<br />\r\n   台南角鋼、角鋼購買詢問、角鋼施工規劃、各種角鋼設計款式</p>\r\n<p class="second_font m_bottom_13">\r\n  Rivet Shelving, also known as Rivet rack,<br />\r\n angle steel, wide span rack, double rivet shelving, double rivet boltless shelving,<br />\r\n   speedibilt or rivet shelving is becoming a very popular type of shelving or rack style.</p>\r\n<p>\r\n  <img alt="" class="m_bottom_13" src="../../public/site/images/p_image10_else.jpg" /></p>\r\n', NULL, NULL, '2016-05-19 13:05:48', '0000-00-00 00:00:00', 0, 1, 1, 0, '1302', '1102', '3');
EOT;
        $query = $this->db->query($insert_sql);
    }
}


