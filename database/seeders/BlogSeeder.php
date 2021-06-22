<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('blogs')->insert([
            'title'=>'Learn Sales',
            'desc'=>'Find your comfort level. ...
            Related: How to Conquer Your Sales Fears.
            Define your target audience. ...
            Study customer buying habits. ...
            Related: Free Market-Research Tools -- A Sampler.
            Fawn over your first customers. ...
            Take time to build relationships.',
            'image'=>'https://mailshake.com/blog/wp-content/uploads/2019/06/Sales-Skills-Anyone-Can-Learn-Header-1.jpg',
            'cat_id'=>'1',
        ]);

        DB::table('blogs')->insert([
            'title'=>'Be Enterpreneur',
            'desc'=>'Step 1
            Find the right business for you.
            Entrepreneurship is a broad term, and you can be an entrepreneur in just about any area. However, you will have to pick a field to work in and business to start. Find a business that won’t only be successful, but is something that you are passionate about. Entrepreneurship is hard work, so you want to focus your attention on something you care about.
            
            Step 2
            Determine if you should get an education
            You dont need to have any type of formal education to be an entrepreneur, but that doesn’t mean you should ignore education entirely. If you want to start a tech company, experience in business, computer programming and marketing could all be valuable. Also, some industries will likely require some type of education, such as your own accounting or law firm.
            
            Step 3
            Plan your business
            Before you begin your business, you need to have a business plan. A business plan lays out any objectives you have as well as your strategy for achieving those objectives. This plan is important for getting investors on board, as well as measuring how successful your business is.
            
            Step 4
            Find your target group/audience
            Not every business appeals to everyone. The age, gender, income, race and culture of your target group will play a large role in determining where you open up shop – or if you even need to have a physical address for business. Research which group fits your business model best, and then gear everything to attract that demographic.
            
            Step 5
            Network
            While networking is important in all fields, it may be most important for entrepreneurs. Networking is how you meet other people that might have skills you can use in your business. You can also find potential investors through networking to help get your business model off the ground. Your network can also support your business once you open, helping send new customers your way.
            
            Step 6
            Sell your idea
            Consumers want products, but they don’t always know which product to pick. Your job as an entrepreneur is to convince people that whatever you’re selling is the best option available. Youll have to find out what makes your product unique and then sell it based off the value it adds.
            
            Step 7
            Market
            You should be focused on marketing before, during and after you start your business. You may have the best restaurant in the city, but nobody will visit if they dont know it exists. Marketing is tricky but if you should be able to focus your marketing efforts on your target audience. For example millennials may be more likely to see an ad on social media than on a billboard downtown',
            'image'=>'https://pbs.twimg.com/media/Ey2DsXXWYAI5vht.jpg:large',
            'cat_id'=>'2',
        ]);
        DB::table('blogs')->insert([
            'title'=>'Motivation',
            'desc'=>'video marketing',
            'image'=>'https://www.eoi.es/blogs/imsd/files/2015/05/Motivation1.jpg',
            'cat_id'=>'3',
        ]);
        DB::table('blogs')->insert([
            'title'=>'Mortgage',
            'desc'=>'video marketing',
            'image'=>'https://rismedia.com/wp-content/uploads/2021/03/mortgage_rates_rising_1185939200-1080x627.jpg',
            'cat_id'=>'4',
        ]);
        DB::table('blogs')->insert([
            'title'=>'Everything About Rants',
            'desc'=>'video marketing',
            'image'=>'https://slideplayer.com/slide/16626268/96/images/4/What+is+a+rant.jpg',
            'cat_id'=>'5',
        ]);
        DB::table('blogs')->insert([
            'title'=>'Video Marketing',
            'desc'=>'video marketing',
            'image'=>'https://s3.amazonaws.com/omiweb/wp-content/uploads/2017/06/20122743/splash-online.jpg',
            'cat_id'=>'6',
        ]);
        DB::table('blogs')->insert([
            'title'=>'Everything About News',
            'desc'=>'video marketing',
            'image'=>'https://www.newsaktuell.com/site-nade/assets/files/1/hero-img7.png',
            'cat_id'=>'7',
        ]);
        DB::table('blogs')->insert([
            'title'=>'Learn about Advertising and Marketing',
            'desc'=>'video marketing',
            'image'=>'https://fruchtman.com/wp-content/uploads/2018/06/406Main-t.jpg',
            'cat_id'=>'8',
        ]);
    }
}
