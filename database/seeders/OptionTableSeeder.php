<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;
use App\Models\Term;
use App\Models\Termmeta;
use App\Models\Menu;
use App\Models\Language;
use App\Models\Withdrawmethod;
use App\Models\Termwithdraw;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::create([
            'key'=>'seo',
            'value'=>'{"title":"LPress","description":null,"canonical":null,"tags":null,"twitterTitle":null}',
        ]);
        $data = [
            'min_amount'     => '100',
            'max_amount'     => '2000',
            'fixed_charge'   => '30',
            'percent_charge' => '10',
            'charge_type'    => 'both',
        ];

        $option        = new Option();
        $option->key   = 'ownbank_charge';
        $option->value = json_encode($data);
        $option->save();


        $data = [
            'sender_charge' => '2',
            'receiver_charge' => '2',
            'charge_type' => 'percentage',
        ];

        $option = new Option();
        $option->key = 'bill_charge';
        $option->value = json_encode($data);
        $option->save();

        $data = [
            'phone_verification' => '',
            'email_verification' => '',
        ];


        $option = new Option();
        $option->key = 'verification_settings';
        $option->value = json_encode($data);
        $option->save();

        $data = [
            'twilio_sid' => '',
            'twilio_auth_token' => '',
            'twilio_number' => '',
            'message' => '',
        ];
        
        $option = new Option();
        $option->key = 'twilio_info';
        $option->value = json_encode($data);
        $option->save();


        // hero section

        $value = [
            'title'             => 'The Simple, Easiest way to grow and save your money.',
            'short_description' => 'Join over 9 million people who get the real exchange rate with TransferWise. We’re on average 8x cheaper than leading UK high street banks.',
            'button_text'       => 'See How We Loan Money',
            'button_url'        => 'https://www.youtube.com/watch?v=y-AmnasDev0',
            'status'            => '1',
        ];

        $hero_section        = new Option();
        $hero_section->key   = 'hero_section';
        $hero_section->value = json_encode($value);
        $hero_section->save();

        // Counter Section
        $counter_data = [
            'happy_customers_no'      => '356,321',
            'happy_customers_title'   => 'Happy Customers',
            'year_banking_no'         => '3',
            'year_banking_title'      => 'Years in banking',
            'our_branches_no'         => '345',
            'our_branches_title'      => 'Our branches',
            'successfully_work_no'    => '5,285',
            'successfully_work_title' => 'Successfully works',
        ];

        $counter_data_in        = new Option();
        $counter_data_in->key   = 'counter';
        $counter_data_in->value = json_encode($counter_data);
        $counter_data_in->save();

        // how it work title
        
        $how_it_work        = new Option();
        $how_it_work->key   = 'titles';
        $how_it_work->value = '{"client_title":"Clients Feedback","client_description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","hwt_title":"How It Works","hwt_description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","tit_title":"Top Invester","tit_description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","lnt_title":"Latest News","lnt_description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","bst_title":"Banking Services","bst_description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","hero_title":"The Simple, Easiest way to grow and save your money.","hero_description":"Join over 9 million people who get the real exchange rate with TransferWise. We\u2019re on average 8x cheaper than leading UK high street banks.","hero_btn_title":"See How We Loan Money","hero_button_url":"https://www.youtube.com/watch?v=y-AmnasDev0"}';
        $how_it_work->save();

      

        $theme        = new Option();
        $theme->key   = 'theme_settings';
        $theme->value = '{"footer_description":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore.","newsletter_address":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com","social":[{"icon":"ri:facebook-fill","link":"#"},{"icon":"ri:twitter-fill","link":"#"},{"icon":"ri:google-fill","link":"#"},{"icon":"ri:instagram-fill","link":"#"},{"icon":"ri:pinterest-fill","link":"#"}]}';
        $theme->save();

        
        $terms = array(
            array('id' => '1','title' => '1. Register for free','slug' => '1-register-for-free','type' => 'howitworks','status' => '1','featured' => '1','created_at' => '2021-02-07 08:15:38','updated_at' => '2021-02-07 08:15:38'),
            array('id' => '2','title' => '2. Choose an amount','slug' => '2-choose-an-amount','type' => 'howitworks','status' => '1','featured' => '1','created_at' => '2021-02-07 08:17:06','updated_at' => '2021-02-07 08:17:06'),
            array('id' => '3','title' => '3. Add recipient’s bank','slug' => '3-add-recipients-bank','type' => 'howitworks','status' => '1','featured' => '1','created_at' => '2021-02-07 08:17:26','updated_at' => '2021-02-07 08:17:26'),
            array('id' => '4','title' => '4. Verify your identity','slug' => '4-verify-your-identity','type' => 'howitworks','status' => '1','featured' => '1','created_at' => '2021-02-07 08:17:44','updated_at' => '2021-02-07 08:17:44'),
            array('id' => '5','title' => '5. Pay for your transfer','slug' => '5-pay-for-your-transfer','type' => 'howitworks','status' => '1','featured' => '1','created_at' => '2021-02-07 08:18:07','updated_at' => '2021-02-07 08:18:07'),
            array('id' => '6','title' => '6. That’s it','slug' => '6-thats-it','type' => 'howitworks','status' => '1','featured' => '1','created_at' => '2021-02-07 08:18:48','updated_at' => '2021-02-07 08:18:48'),
            array('id' => '7','title' => 'Credit Card','slug' => 'credit-card','type' => 'services','status' => '1','featured' => '1','created_at' => '2021-02-07 08:27:35','updated_at' => '2021-02-07 08:27:35'),
            array('id' => '8','title' => 'Personal Loans','slug' => 'personal-loans','type' => 'services','status' => '1','featured' => '1','created_at' => '2021-02-07 08:28:18','updated_at' => '2021-02-07 08:28:18'),
            array('id' => '9','title' => 'Saving Account','slug' => 'saving-account','type' => 'services','status' => '1','featured' => '1','created_at' => '2021-02-07 08:29:01','updated_at' => '2021-02-07 08:29:01'),
            array('id' => '10','title' => 'Bussiness Banking','slug' => 'bussiness-banking','type' => 'services','status' => '1','featured' => '1','created_at' => '2021-02-07 08:30:19','updated_at' => '2021-02-07 08:30:19'),
            array('id' => '11','title' => 'Md. Json Deo','slug' => 'md-json-deo','type' => 'investor','status' => '1','featured' => '1','created_at' => '2021-02-07 08:31:18','updated_at' => '2021-02-07 08:31:18'),
            array('id' => '12','title' => 'Md. Json Deo','slug' => 'md-json-deo','type' => 'investor','status' => '1','featured' => '1','created_at' => '2021-02-07 08:31:39','updated_at' => '2021-02-07 08:31:39'),
            array('id' => '13','title' => 'Md. Json Deo','slug' => 'md-json-deo','type' => 'investor','status' => '1','featured' => '1','created_at' => '2021-02-07 08:31:50','updated_at' => '2021-02-07 08:31:50'),
            array('id' => '14','title' => 'Md. Json Deo','slug' => 'md-json-deo','type' => 'investor','status' => '1','featured' => '1','created_at' => '2021-02-07 08:32:01','updated_at' => '2021-02-07 08:32:01'),
            array('id' => '15','title' => 'Md. Jhon Deo','slug' => 'md-jhon-deo','type' => 'feedback','status' => '1','featured' => '1','created_at' => '2021-02-07 08:32:51','updated_at' => '2021-02-07 08:32:51'),
            array('id' => '16','title' => 'Macon Vinson','slug' => 'macon-vinson','type' => 'feedback','status' => '1','featured' => '1','created_at' => '2021-02-07 08:33:09','updated_at' => '2021-02-07 08:33:09'),
            array('id' => '17','title' => 'The security risks of changing package owners','slug' => 'the-security-risks-of-changing-package-owners','type' => 'news','status' => '1','featured' => '1','created_at' => '2021-02-07 08:34:11','updated_at' => '2021-02-07 08:34:11'),
            array('id' => '18','title' => 'How to invest and get money form E-Banking','slug' => 'how-to-invest-and-get-money-form-e-banking','type' => 'news','status' => '1','featured' => '1','created_at' => '2021-02-07 08:34:38','updated_at' => '2021-02-07 08:34:38'),
            array('id' => '19','title' => 'The security risks of changing package owners','slug' => 'the-security-risks-of-changing-package-owners','type' => 'news','status' => '1','featured' => '1','created_at' => '2021-02-07 08:35:13','updated_at' => '2021-02-07 08:35:13'),
            array('id' => '20','title' => 'About','slug' => 'about','type' => 'page','status' => '1','featured' => '1','created_at' => '2021-02-10 09:11:09','updated_at' => '2021-02-10 09:11:09'),
            array('id' => '21','title' => 'Faq','slug' => 'faq','type' => 'page','status' => '1','featured' => '1','created_at' => '2021-02-10 09:33:12','updated_at' => '2021-02-10 09:33:12'),
            array('id' => '22','title' => 'INR','slug' => '72.86','type' => 'currency','status' => '1','featured' => '1','created_at' => '2021-02-10 10:19:02','updated_at' => '2021-02-10 10:19:02'),
            array('id' => '23','title' => 'CAD','slug' => '1.27','type' => 'currency','status' => '1','featured' => '1','created_at' => '2021-02-10 10:19:22','updated_at' => '2021-02-10 10:19:22'),
            array('id' => '24','title' => 'BTC','slug' => '0.000021','type' => 'currency','status' => '1','featured' => '1','created_at' => '2021-02-10 10:19:45','updated_at' => '2021-02-10 10:19:45'),
             array('id' => '25','title' => 'terms and condition','slug' => 'terms-and-condition','type' => 'page','status' => '1','featured' => '1','created_at' => '2021-02-16 10:52:20','updated_at' => '2021-02-16 10:52:20')
        );

        Term::insert($terms);

        $termmetas = array(
            array('id' => '1','term_id' => '1','key' => 'howitworks','value' => '{"description":"Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.","image":"uploads\\/21\\/02\\/1691023560954847.png"}'),
            array('id' => '2','term_id' => '2','key' => 'howitworks','value' => '{"description":"Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.","image":"uploads\\/21\\/02\\/1691023653462586.png"}'),
            array('id' => '3','term_id' => '3','key' => 'howitworks','value' => '{"description":"Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.","image":"uploads\\/21\\/02\\/1691023674505921.png"}'),
            array('id' => '4','term_id' => '4','key' => 'howitworks','value' => '{"description":"Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.","image":"uploads\\/21\\/02\\/1691023692819314.png"}'),
            array('id' => '5','term_id' => '5','key' => 'howitworks','value' => '{"description":"Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.","image":"uploads\\/21\\/02\\/1691023717524345.png"}'),
            array('id' => '6','term_id' => '6','key' => 'howitworks','value' => '{"description":"Ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel adipiscing aliqua.","image":"uploads\\/21\\/02\\/1691023759965205.png"}'),
            array('id' => '7','term_id' => '7','key' => 'services','value' => '{"description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","short_description":"Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","image":"uploads\\/21\\/02\\/1691024312116945.png"}'),
            array('id' => '8','term_id' => '8','key' => 'services','value' => '{"description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","short_description":"Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","image":"uploads\\/21\\/02\\/1691024357803023.png"}'),
            array('id' => '9','term_id' => '9','key' => 'services','value' => '{"description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","short_description":"Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","image":"uploads\\/21\\/02\\/1691024403235113.png"}'),
            array('id' => '10','term_id' => '10','key' => 'services','value' => '{"description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","short_description":"Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","image":"uploads\\/21\\/02\\/1691024484429138.png"}'),
            array('id' => '11','term_id' => '11','key' => 'investor','value' => '{"position":"Top Investor","facebook_link":"#","twitter_link":"#","linkedin_link":"#","image":"uploads\\/21\\/02\\/1691024546818640.png"}'),
            array('id' => '12','term_id' => '12','key' => 'investor','value' => '{"position":"Top Investor","facebook_link":"#","twitter_link":"#","linkedin_link":"#","image":"uploads\\/21\\/02\\/1691024568726071.png"}'),
            array('id' => '13','term_id' => '13','key' => 'investor','value' => '{"position":"Top Investor","facebook_link":"#","twitter_link":"#","linkedin_link":"#","image":"uploads\\/21\\/02\\/1691024580466670.png"}'),
            array('id' => '14','term_id' => '14','key' => 'investor','value' => '{"position":"Top Investor","facebook_link":"#","twitter_link":"#","linkedin_link":"#","image":"uploads\\/21\\/02\\/1691024591231320.png"}'),
            array('id' => '15','term_id' => '15','key' => 'feedback','value' => '{"client_image":"uploads\\/21\\/02\\/1691024644185588.png","client_review":"Very ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae.","client_position":"Head Of Marketing, Company CEO"}'),
            array('id' => '16','term_id' => '16','key' => 'feedback','value' => '{"client_image":"uploads\\/21\\/02\\/1691024662640745.png","client_review":"Very ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae.","client_position":"Head Of Marketing, Company CEO"}'),
            array('id' => '17','term_id' => '17','key' => 'excerpt','value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.'),
            array('id' => '18','term_id' => '17','key' => 'thum_image','value' => 'uploads/21/02/1691024727674365.jpg'),
            array('id' => '19','term_id' => '17','key' => 'description','value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
            array('id' => '20','term_id' => '18','key' => 'excerpt','value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.'),
            array('id' => '21','term_id' => '18','key' => 'thum_image','value' => 'uploads/21/02/1691024756592492.jpg'),
            array('id' => '22','term_id' => '18','key' => 'description','value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
            array('id' => '23','term_id' => '19','key' => 'excerpt','value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.'),
            array('id' => '24','term_id' => '19','key' => 'thum_image','value' => 'uploads/21/02/1691024793346135.jpg'),
            array('id' => '25','term_id' => '19','key' => 'description','value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
            array('id' => '26','term_id' => '20','key' => 'page','value' => '{"page_excerpt":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.","page_content":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","thum_image":"uploads\\/21\\/02\\/1691298844437341.jpg"}'),
            array('id' => '27','term_id' => '21','key' => 'page','value' => '{"page_excerpt":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.","page_content":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","thum_image":"uploads\\/21\\/02\\/1691300232318513.jpg"}'),
            array('id' => '28','term_id' => '22','key' => 'content','value' => '{"logo":"uploads\\/21\\/02\\/1691303115851719.png"}'),
            array('id' => '29','term_id' => '23','key' => 'content','value' => '{"logo":"uploads\\/21\\/02\\/1691303136495322.png"}'),
            array('id' => '30','term_id' => '24','key' => 'content','value' => '{"logo":"uploads\\/21\\/02\\/1691303160779365.png"}'),
             array('id' => '31','term_id' => '25','key' => 'page','value' => '{"page_excerpt":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,","page_content":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."}')
        );       

        Termmeta::insert($termmetas);

        $menu = array(
          array('id' => '1','name' => 'Header','position' => 'header','data' => '[{"text":"Home","href":"/","icon":"empty","target":"_self","title":""},{"text":"About","href":"/page/about","icon":"empty","target":"_self","title":""},{"text":"Services","href":"/services","icon":"empty","target":"_self","title":""},{"text":"Latest News","href":"/news","icon":"empty","target":"_self","title":""},{"text":"Faq","href":"/page/faq","icon":"empty","target":"_self","title":""},{"text":"Contact","href":"/contact","icon":"empty","target":"_self","title":""}]','lang' => 'en','status' => '1','created_at' => '2021-02-08 04:20:13','updated_at' => '2021-02-10 09:36:41'),
          array('id' => '2','name' => 'Explore','position' => 'footer_left','data' => '[{"text":"About Us","icon":"empty","href":"/page/about-us","target":"_self","title":""},{"text":"Contact Us","icon":"empty","href":"/contact","target":"_self","title":""},{"text":"Faq","icon":"empty","href":"/page/faq","target":"_self","title":""},{"text":"Blog","icon":"empty","href":"/news","target":"_self","title":""},{"text":"Terms & Conditions","icon":"","href":"/page/terms-and-condition","target":"_self","title":""}]','lang' => 'en','status' => '1','created_at' => '2021-02-15 14:09:46','updated_at' => '2021-02-15 14:16:03'),
          array('id' => '3','name' => 'Quick Links','position' => 'footer_right','data' => '[{"text":"My Account ","href":"/user/dashboard","icon":"","target":"_self","title":""},{"text":"Withdraw","icon":"","href":"/user/transfer/otherbank","target":"_self","title":""},{"text":"Support","href":"/user/support","icon":"empty","target":"_self","title":""},{"text":"Register","href":"/register","icon":"empty","target":"_self","title":""},{"text":"Login","href":"/user/login","icon":"empty","target":"_self","title":""}]','lang' => 'en','status' => '1','created_at' => '2021-02-15 14:10:14','updated_at' => '2021-02-15 14:30:08')
      );


        Menu::insert($menu);

        $languages = array(
            array('id' => '1','name' => 'en','position' => 'ltr','data' => 'English','status' => '1','created_at' => '2021-02-08 04:19:45','updated_at' => '2021-02-08 04:22:31')
        );

        Language::insert($languages);

        $withdrawmethods = array(
            array('id' => '1','title' => 'Low Cost Transfer','min_amount' => '50','max_amount' => '5000','charge_type' => 'fixed','fix_charge' => '2','percent_charge' => '0','status' => '1','created_at' => '2021-02-10 09:46:25','updated_at' => '2021-02-10 09:50:28'),
            array('id' => '2','title' => 'Fast & Easy Transfer','min_amount' => '50','max_amount' => '5000','charge_type' => 'both','fix_charge' => '2','percent_charge' => '2','status' => '1','created_at' => '2021-02-10 09:49:38','updated_at' => '2021-02-10 09:50:39')
        );
          
        Withdrawmethod::insert($withdrawmethods);

        $termwithdraws = array(
            array('term_id' => '23','withdrawmethod_id' => '1'),
            array('term_id' => '22','withdrawmethod_id' => '2'),
            array('term_id' => '23','withdrawmethod_id' => '2')
        );
        Termwithdraw::insert($termwithdraws);
          
    }
}
