<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome']);
// });

// Frontend site

Route::get('/', [App\Http\Controllers\FrontPageController::class, 'index'])->name('index');
Route::get('/about-us',[App\Http\Controllers\PagesController::class,'about_us'])->name('about.us');
Route::get('/privacy-policy',[App\Http\Controllers\PagesController::class,'privacy_policy'])->name('privacy.policy');
Route::get('/terms-conditions',[App\Http\Controllers\PagesController::class,'terms_conditions'])->name('terms.conditions');
Route::get('/articles',[App\Http\Controllers\PagesController::class,'articles'])->name('articles');
Route::get('/article-detail',[App\Http\Controllers\PagesController::class,'article_detail'])->name('article.detail');
Route::get('/blog-detail',[App\Http\Controllers\PagesController::class,'blog_detail'])->name('blog.detail');
Route::get('/blog',[App\Http\Controllers\PagesController::class,'blog'])->name('blog');
Route::get('/boost-detail',[App\Http\Controllers\PagesController::class,'boost_detail'])->name('boost.detail');
Route::get('/boost-your-ad',[App\Http\Controllers\PagesController::class,'boost_your_ad'])->name('boost.your.ad');
Route::get('/brand-child',[App\Http\Controllers\PagesController::class,'brand_child'])->name('brand.child');
Route::get('/careers',[App\Http\Controllers\PagesController::class,'careers'])->name('careers');
Route::get('/category',[App\Http\Controllers\PagesController::class,'category'])->name('category');
Route::get('/checkout',[App\Http\Controllers\PagesController::class,'checkout'])->name('checkout');
Route::get('/contact',[App\Http\Controllers\PagesController::class,'contact'])->name('contact');
Route::post('/store-contact',[App\Http\Controllers\PagesController::class,'store'])->name('contact_us');
Route::get('/dashboard',[App\Http\Controllers\PagesController::class,'dashboard'])->name('dashboard');
Route::get('/detail-banner',[App\Http\Controllers\PagesController::class,'detail_banner'])->name('detail.banner');
Route::get('/detail-banner-in-slider',[App\Http\Controllers\PagesController::class,'detail_banner_in_slider'])->name('detail.banner.in.slider');
Route::get('/detail-without-banner',[App\Http\Controllers\PagesController::class,'detail_without_banner'])->name('detail.without.banner');
Route::get('/editad',[App\Http\Controllers\PagesController::class,'editad'])->name('editad');
Route::get('/events',[App\Http\Controllers\PagesController::class,'events'])->name('events');
Route::get('/events-detail',[App\Http\Controllers\PagesController::class,'events_detail'])->name('events.detail');
Route::get('/faq',[App\Http\Controllers\PagesController::class,'faq'])->name('faq');
Route::get('/faq-right-category',[App\Http\Controllers\PagesController::class,'faq_right_category'])->name('faq.right,category');
Route::get('/forgot-password',[App\Http\Controllers\PagesController::class,'forgot_password'])->name('forgot-password');
Route::get('/forums',[App\Http\Controllers\PagesController::class,'forums'])->name('forums');
Route::get('/gallery',[App\Http\Controllers\PagesController::class,'gallery'])->name('gallery');
Route::get('/help-and-support',[App\Http\Controllers\PagesController::class,'help_and_support'])->name('help.and.support');
Route::get('/list-view-listing',[App\Http\Controllers\PagesController::class,'list_view_listing'])->name('list.view.listing');
Route::get('/listing-left-sidebar',[App\Http\Controllers\PagesController::class,'listing_left_sidebar'])->name('listing.left.sidebar');
Route::get('/listing-top-serch',[App\Http\Controllers\PagesController::class,'listing_top_serch'])->name('listing.top.serch');
Route::get('/my-ads',[App\Http\Controllers\PagesController::class,'MyAds'])->name('MyAds');

Route::get('/my-favorits',[App\Http\Controllers\PagesController::class,'my_favorits'])->name('my.favorits');
Route::get('/my-purchases',[App\Http\Controllers\PagesController::class,'my_purchases'])->name('my.purchases');
Route::get('/news',[App\Http\Controllers\PagesController::class,'news'])->name('news');
Route::get('/news-detail',[App\Http\Controllers\PagesController::class,'news_detail'])->name('news.detail');
Route::get('/offers-messages',[App\Http\Controllers\PagesController::class,'offers_messages'])->name('offers.messages');
Route::get('/pages',[App\Http\Controllers\PagesController::class,'pages'])->name('pages');
Route::get('/payment',[App\Http\Controllers\PagesController::class,'payment'])->name('payment');
Route::get('/post',[App\Http\Controllers\PagesController::class,'post'])->name('post');
Route::get('/profile',[App\Http\Controllers\PagesController::class,'profile'])->name('profile');

Route::get('/prvacy-settings',[App\Http\Controllers\PagesController::class,'prvacy_settings'])->name('prvacy.settings');
Route::get('/purchased-single-product',[App\Http\Controllers\PagesController::class,'purchased_single_product'])->name('purchased.single.product');
Route::get('/search-result',[App\Http\Controllers\PagesController::class,'search_result'])->name('faq.right.category');
Route::get('/single-ad-duplicate',[App\Http\Controllers\PagesController::class,'single_ad_duplicate'])->name('single.ad.duplicate');
Route::get('/thank-you',[App\Http\Controllers\PagesController::class,'thank_you'])->name('thank.you');
Route::get('/404-with-banner',[App\Http\Controllers\PagesController::class,'with_banner'])->name('404.with.banner');

// Sociallite
Route::get('/login/{social}', [App\Http\Controllers\Auth\LoginController::class,'socialLogin'])->where('social', 'twitter|facebook|apple|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback', [App\Http\Controllers\Auth\LoginController::class,'handleProviderCallback'])->where('social', 'twitter|facebook|apple|linkedin|google|github|bitbucket');


        // Admin Panel
        Auth::routes();

        Route::post('admin-login', [App\Http\Controllers\Admin\LoginController::class, 'verifyCredentials']);

    
        Route::get('user-filter', [App\Http\Controllers\Admin\UserController::class, 'userFilter']);
        
        // Block and in-block user
        Route::get('user-block/{id}', [App\Http\Controllers\Admin\UserController::class, 'blockUser']);
        Route::get('user-un-block/{id}', [App\Http\Controllers\Admin\UserController::class, 'unBlockUser']);
        
        //Dashboard
        Route::get('pending-ads', [App\Http\Controllers\Admin\SellController::class, 'pendingads']);
        Route::get('reset-user-from-admin', [App\Http\Controllers\Admin\ChangePasswordController::class,'changeFromAdmin']);
        Route::get('deactivated-accounts-list', [App\Http\Controllers\Admin\DashboardController::class, 'deactivated']);
        Route::get('locked', [App\Http\Controllers\Admin\DashboardController::class, 'locked']);

        Route::get('total-ads', [App\Http\Controllers\Admin\DashboardController::class, 'totalAds']);
        Route::get('reject-ads', [App\Http\Controllers\Admin\DashboardController::class, 'rejectAds']);
        Route::get('approved-ads', [App\Http\Controllers\Admin\DashboardController::class, 'approvedAds']);
        
        
        Route::get('expired-ads', [App\Http\Controllers\Admin\DashboardController::class, 'expiredAds']);
        Route::get('total-users', [App\Http\Controllers\Admin\DashboardController::class, 'totalUsers']);
        Route::get('new-users', [App\Http\Controllers\Admin\DashboardController::class, 'newUsers']);

        Route::get('active-banner-ads', [App\Http\Controllers\Admin\DashboardController::class, 'activeBannerAds']);
        Route::get('expired-banner-ads', [App\Http\Controllers\Admin\DashboardController::class, 'expiredBannerAds']);
        // Category Featured Listings FOr Dashboard
        Route::get('total-category-featured', [App\Http\Controllers\Admin\DashboardController::class, 'totalFeatured']);
        Route::get('active-category-featured', [App\Http\Controllers\Admin\DashboardController::class, 'activeFeatured']);
        Route::get('expired-category-featured', [App\Http\Controllers\Admin\DashboardController::class, 'expiredFeatured']);
        Route::get('today-category-featured', [App\Http\Controllers\Admin\DashboardController::class, 'todayFeatured']);

        // Brand Featured Listings FOr Dashboard
        Route::get('total-type-featured', [App\Http\Controllers\Admin\DashboardController::class, 'totalBrand']);
        Route::get('active-type-featured', [App\Http\Controllers\Admin\DashboardController::class, 'activeBrand']);
        Route::get('expired-type-featured', [App\Http\Controllers\Admin\DashboardController::class, 'expiredBrand']);
        Route::get('today-type-featured', [App\Http\Controllers\Admin\DashboardController::class, 'todayBrand']);

        // Search Featured Listings FOr Dashboard
        Route::get('total-search-featured', [App\Http\Controllers\Admin\DashboardController::class, 'totalSearchFeatured']);
        Route::get('active-search-featured', [App\Http\Controllers\Admin\DashboardController::class, 'activeSearchFeatured']);
        Route::get('expired-search-featured', [App\Http\Controllers\Admin\DashboardController::class, 'expiredSearchFeatured']);
        Route::get('today-search-featured', [App\Http\Controllers\Admin\DashboardController::class, 'todaySearchFeatured']);

        // Home Featured Listings FOr Dashboard
        Route::get('total-home-featured', [App\Http\Controllers\Admin\DashboardController::class, 'totalHomeFeatured']);
        Route::get('active-home-featured', [App\Http\Controllers\Admin\DashboardController::class, 'activeHomeFeatured']);
        Route::get('expired-home-featured', [App\Http\Controllers\Admin\DashboardController::class, 'expiredHomeFeatured']);
        Route::get('today-home-featured', [App\Http\Controllers\Admin\DashboardController::class, 'todayHomeFeatured']);

        // Shop Featured Listings FOr Dashboard
        Route::get('total-shop-featured', [App\Http\Controllers\Admin\DashboardController::class, 'totalShopFeatured']);
        Route::get('active-shop-featured', [App\Http\Controllers\Admin\DashboardController::class, 'activeShopFeatured']);
        Route::get('expired-shop-featured', [App\Http\Controllers\Admin\DashboardController::class, 'expiredShopFeatured']);
        Route::get('today-shop-featured', [App\Http\Controllers\Admin\DashboardController::class, 'todayShopFeatured']);

        // Bump Up Ads FOr Dashboard
        Route::get('total-bump-up', [App\Http\Controllers\Admin\DashboardController::class, 'totalBumpUp']);
        Route::get('active-bump-up', [App\Http\Controllers\Admin\DashboardController::class, 'activeBumpUp']);
        Route::get('expired-bump-up', [App\Http\Controllers\Admin\DashboardController::class, 'expiredBumpUp']);
        Route::get('today-bump-up', [App\Http\Controllers\Admin\DashboardController::class, 'todayBumpUp']);

        // Route::get('expired-banner-ads',[App\Http\Controllers\Admin\DashboardController::class, 'expiredBannerAds']);
        // Route::get('expired-banner-ads',[App\Http\Controllers\Admin\DashboardController::class, 'expiredBannerAds']);
        // Route::get('expired-banner-ads',[App\Http\Controllers\Admin\DashboardController::class, 'expiredBannerAds']);
        

        Route::post('user/get_user_name', [App\Http\Controllers\ChangePasswordController::class, 'get_user_name']);

        Route::post('user/get_user_id', [App\Http\Controllers\ChangePasswordController::class, 'get_user_id']);

        // Route::post('user/get_user_email','ChangePasswordController::class, 'get_user_email']);
        Route::get('admin-user-detail/{id}', [App\Http\Controllers\ProfileController::class, 'view_user_detail']);

        //   Approval
        Route::get('adsell', [App\Http\Controllers\Admin\SellController::class, 'index']);
        Route::get('admin/all-search-products', [App\Http\Controllers\Admin\SellController::class, 'searchproducts']);
        
        Route::get('create-adsell-list', [App\Http\Controllers\Admin\SellController::class, 'create']);
        Route::post('save-adsell-list', [App\Http\Controllers\Admin\SellController::class, 'store']);
        Route::post('admin/get-subCategories', [App\Http\Controllers\Admin\SellController::class, 'get_subCategories']);
        Route::post('admin/get-subCategories-data', [App\Http\Controllers\Admin\SellController::class, 'get_subCategories_data']);
        Route::post('admin/get-user-data', [App\Http\Controllers\Admin\SellController::class, 'get_user_data']);

        Route::get('edit-ads-list/{id}', [App\Http\Controllers\Admin\SellController::class, 'edit']);
        Route::post('update-ads-list/{id}', [App\Http\Controllers\Admin\SellController::class, 'update']);

        Route::post('ads-change-status', [App\Http\Controllers\Admin\SellController::class, 'ads_change_status']);
        Route::post('view-ads-data', [App\Http\Controllers\Admin\SellController::class, 'view_ads_data']);
        Route::post('change-multi-status', [App\Http\Controllers\Admin\SellController::class, 'change_multi_status']);

        Route::get('check-expire', [App\Http\Controllers\Admin\SellController::class, 'check_expire']);

        Route::get('admin-dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
        Route::post('admin-logout', [App\Http\Controllers\Admin\LoginController::class, 'logout']);

        /*Route::get('logout',function(){
        
        
        return redirect('/']);
        
        
        });*/
        
        
        // admin earning
        Route::get('admin-earning', [App\Http\Controllers\Admin\WalletController::class, 'adminEarning'])->name('admin-earning');

        Route::get('admin/wish-list', [App\Http\Controllers\Admin\WishListController::class, 'index']);
        Route::post('admin/delete-wishlist', [App\Http\Controllers\Admin\WishListController::class, 'deleteall']);

        Route::get('user-report-list', [App\Http\Controllers\Admin\UserreportController::class, 'index']);
        Route::post('change-report-status', [App\Http\Controllers\Admin\UserreportController::class, 'change_report_status']);

        //
        Route::get('registration-setting', [App\Http\Controllers\Admin\RegistersettingController::class, 'index']);
        Route::post('registration-setting-status', [App\Http\Controllers\Admin\RegistersettingController::class, 'registration_setting_status']);

        Route::get('ads-sell-setting', [App\Http\Controllers\Admin\AdssellsettingController::class, 'index']);
        Route::post('ads-sell-setting-status', [App\Http\Controllers\Admin\AdssellsettingController::class, 'ads_sell_setting_status']);

        Route::get('developer-mode-setting', [App\Http\Controllers\Admin\DevelopersettingController::class, 'index']);
        Route::post('developer-mode-status', [App\Http\Controllers\Admin\DevelopersettingController::class, 'developer_mode_status']);
        
        Route::get('developer-mode', [App\Http\Controllers\Admin\DevelopersettingController::class, 'create']);
        Route::post('developer-mode', [App\Http\Controllers\Admin\DevelopersettingController::class, 'save']);
        
        //
        

        Route::get('report-setting', [App\Http\Controllers\Admin\ReportsettingController::class, 'index'])->name('report-setting');
        Route::get('create-report-setting', [App\Http\Controllers\Admin\ReportsettingController::class, 'create']);
        Route::post('save-report-setting', [App\Http\Controllers\Admin\ReportsettingController::class, 'store']);
        Route::post('delete-report-setting/', [App\Http\Controllers\Admin\ReportsettingController::class, 'delete']);
        Route::post('delete-report-all', [App\Http\Controllers\Admin\ReportsettingController::class, 'deleteall']);
        Route::get('edit-report-setting/{id}', [App\Http\Controllers\Admin\ReportsettingController::class, 'edit']);
        Route::post('update-report-setting/{id}', [App\Http\Controllers\Admin\ReportsettingController::class, 'update']);

        Route::get('bids-setting', [App\Http\Controllers\Admin\BidssettingController::class, 'index']);
        Route::get('create-bids-setting', [App\Http\Controllers\Admin\BidssettingController::class, 'create']);
        Route::post('save-bids-setting', [App\Http\Controllers\Admin\BidssettingController::class, 'store']);
        Route::post('delete-bids-setting/', [App\Http\Controllers\Admin\BidssettingController::class, 'delete']);
        Route::post('delete-bidsetting-all', [App\Http\Controllers\Admin\BidssettingController::class, 'deleteall']);
        Route::get('edit-bids-setting/{id}', [App\Http\Controllers\Admin\BidssettingController::class, 'edit']);
        Route::post('update-bids-setting/{id}', [App\Http\Controllers\Admin\BidssettingController::class, 'update']);

        Route::get('banner-setting', [App\Http\Controllers\Admin\BannersettingController::class, 'index'])->name('banner-setting');
        Route::get('edit-banner-setting/{id}', [App\Http\Controllers\Admin\BannersettingController::class, 'edit']);
        Route::post('update-banner-setting/{id}', [App\Http\Controllers\Admin\BannersettingController::class, 'update']);

        // bumpUp control setting
        Route::get('bumup-ads-setting', [App\Http\Controllers\Admin\BumpsettingController::class, 'index']);
        Route::post('update-bump-up-setting', [App\Http\Controllers\Admin\BumpsettingController::class, 'update']);

        // Payment control setting
        Route::get('payment-setting', [App\Http\Controllers\Admin\PaymentsettingController::class, 'index']);
        Route::post('update-payment-setting', [App\Http\Controllers\Admin\PaymentsettingController::class, 'update']);

        Route::get('admin-safe-pay', [App\Http\Controllers\Admin\SavePayController::class, 'save_pay']);
        Route::get('ticket', [App\Http\Controllers\Admin\SavePayController::class, 'ticket']);

        Route::get('ticket-conversation', [App\Http\Controllers\Admin\SavePayController::class, 'ticket_conversation']);

        // Backend Wallet
        Route::get('wallet-funds', [App\Http\Controllers\Admin\WalletController::class, 'wallet_funds']);
        Route::post('wallet-funds', [App\Http\Controllers\Admin\WalletController::class, 'wallet_funds_status_change']);
        Route::get('wallet-transactions', [App\Http\Controllers\Admin\WalletController::class, 'wallet_transactions']);
        Route::post('wallet-transactions', [App\Http\Controllers\Admin\WalletController::class, 'wallet_transactions_status_change']);
        
        Route::get('wallet-deposit', [App\Http\Controllers\Admin\WalletController::class, 'wallet_deposit']);

        //   User's Earned Coins
        Route::get('coin-transactions', [App\Http\Controllers\Admin\CoinWalletController::class, 'index']);
        Route::get('coin-transaction-status-wise', [App\Http\Controllers\Admin\CoinWalletController::class, 'coinTrasactionStatusWise']);

        Route::get('user-list', [App\Http\Controllers\Admin\UserController::class, 'index']);
        
        Route::get('admin/user-wallet', [App\Http\Controllers\Admin\UserController::class, 'userWallet']);
        
        Route::get('create-user-list', [App\Http\Controllers\Admin\UserController::class, 'create']);
        Route::post('save-user-list', [App\Http\Controllers\Admin\UserController::class, 'store']);
        Route::post('delete-user-list/', [App\Http\Controllers\Admin\UserController::class, 'delete']);
        Route::post('delete-user-all',[App\Http\Controllers\Admin\UserController::class, 'deleteall']);
        Route::get('edit-user-list/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
        Route::post('update-user-list/{id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
        Route::get('view-user-detail/{id}', [App\Http\Controllers\Admin\UserController::class, 'view']);
        Route::post('change-user-status', [App\Http\Controllers\Admin\UserController::class, 'change_user_status']);
        Route::get('generate-password', [App\Http\Controllers\Admin\UserController::class, 'generatePassword']);
        Route::get('social-accounts', [App\Http\Controllers\Admin\UserController::class, 'socialAccounts']);

        Route::get('company-list', [App\Http\Controllers\Admin\CompanyController::class, 'index']);
        Route::get('create-company-list', [App\Http\Controllers\Admin\CompanyController::class, 'create']);
        Route::post('save-company-list', [App\Http\Controllers\Admin\CompanyController::class, 'store']);
        Route::post('delete-company-list/', [App\Http\Controllers\Admin\CompanyController::class, 'delete']);
        Route::get('edit-company-list/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit']);
        Route::post('update-company-list/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'update']);
        Route::get('view-company-detail/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'view']);
        Route::post('change-company-status', [App\Http\Controllers\Admin\CompanyController::class, 'change_company_status']);

        Route::get('admin/all-faqs', [App\Http\Controllers\Admin\FaqsController::class, 'index'])->name('admin/all-faqs');
        Route::get('admin/create-faq', [App\Http\Controllers\Admin\FaqsController::class, 'create']);
        Route::post('admin/save-faq', [App\Http\Controllers\Admin\FaqsController::class, 'saveFaq']);
        Route::post('admin/delete-faq/', [App\Http\Controllers\Admin\FaqsController::class, 'delete']);
        Route::get('admin/edit-faq/{id}', [App\Http\Controllers\Admin\FaqsController::class, 'edit']);
        Route::post('admin/update-faq/{id}', [App\Http\Controllers\Admin\FaqsController::class, 'update']);

        Route::get('admin/pages/{id}', [App\Http\Controllers\Admin\PagesController::class, 'common_pages']);
        Route::post('admin/pages/update-page/{id}', [App\Http\Controllers\Admin\PagesController::class, 'update_common_page']);

        Route::get('admin/contact-us', [App\Http\Controllers\Admin\PagesController::class, 'show_contact_form']);
        Route::post('admin/pages/update-contact-page/{id}', [App\Http\Controllers\Admin\PagesController::class, 'update_contact_page']);

        Route::get('admin/all-subscription-plans', [App\Http\Controllers\Admin\SubscriptionplansController::class, 'index']);
        Route::get('admin/create-subscription-plans', [App\Http\Controllers\Admin\SubscriptionplansController::class, 'create']);
        Route::post('admin/save-subscription-plans', [App\Http\Controllers\Admin\SubscriptionplansController::class, 'store']);
        Route::post('admin/delete-subscription-plans/', [App\Http\Controllers\Admin\SubscriptionplansController::class, 'delete']);
        Route::get('admin/edit-subscription-plans/{id}', [App\Http\Controllers\Admin\SubscriptionplansController::class, 'edit']);
        Route::post('admin/update-subscription-plans/{id}', [App\Http\Controllers\Admin\SubscriptionplansController::class, 'update']);

        Route::get('admin/purchases-subscription-plans', [App\Http\Controllers\Admin\PurchasessubsplansController::class, 'index']);
        Route::get('admin/create-purchases-subscription-plans', [App\Http\Controllers\Admin\PurchasessubsplansController::class, 'create']);
        Route::post('admin/save-purchases-subscription-plans', [App\Http\Controllers\Admin\PurchasessubsplansController::class, 'store']);
        Route::post('admin/delete-purchases-subscription-plans/', [App\Http\Controllers\Admin\PurchasessubsplansController::class, 'delete']);
        Route::get('admin/edit-purchases-subscription-plans/{id}', [App\Http\Controllers\Admin\PurchasessubsplansController::class, 'edit']);
        Route::post('admin/update-purchases-subscription-plans/{id}', [App\Http\Controllers\Admin\PurchasessubsplansController::class, 'update']);

        Route::get('admin/services',[App\Http\Controllers\Admin\ServicesController::class, 'index'])->name('admin/services');
        Route::get('admin/create-services', [App\Http\Controllers\Admin\ServicesController::class, 'create']);
        Route::post('admin/save-services', [App\Http\Controllers\Admin\ServicesController::class, 'store']);
        Route::post('admin/delete-services-ads/', [App\Http\Controllers\Admin\ServicesController::class, 'delete']);
        Route::post('delete-services-all',[App\Http\Controllers\Admin\ServicesController::class, 'deleteall']);
        Route::get('admin/edit-services/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'edit']);
        Route::post('admin/update-services/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'update']);
        Route::post('admin/approve-services/', [App\Http\Controllers\Admin\ServicesController::class, 'approve']);

        Route::get('admin/purchases-services', [App\Http\Controllers\Admin\ServicesController::class, 'purchases']);
        Route::post('admin/approve-services-plans/', [App\Http\Controllers\Admin\ServicesController::class, 'approve']);
        Route::post('admin/reject-services-plans/', [App\Http\Controllers\Admin\ServicesController::class, 'reject']);

        Route::get('admin/all-bump-up-ads', [App\Http\Controllers\Admin\BumpupadsController::class, 'index']);
        Route::get('admin/create-bump-up-ads', [App\Http\Controllers\Admin\BumpupadsController::class, 'create']);
        Route::post('admin/save-bump-up-ads', [App\Http\Controllers\Admin\BumpupadsController::class, 'store']);
        Route::post('admin/delete-bump-up-ads/', [App\Http\Controllers\Admin\BumpupadsController::class, 'delete']);
        Route::post('delete-bumpups-all', [App\Http\Controllers\Admin\BumpupadsController::class, 'deleteall']);
        Route::get('admin/edit-bump-up-ads/{id}', [App\Http\Controllers\Admin\BumpupadsController::class, 'edit']);
        Route::post('admin/update-bump-up-ads/{id}', [App\Http\Controllers\Admin\BumpupadsController::class, 'update']);
        Route::post('admin/approve-bumpup-plans/', [App\Http\Controllers\Admin\BumpupadsController::class, 'approve']);

        Route::get('admin/userchat', [App\Http\Controllers\Admin\UserchatController::class, 'index']);
        Route::get('admin/user-chat/{id}', [App\Http\Controllers\Admin\UserchatController::class, 'view']);
        Route::post('delete-chat-selected',[App\Http\Controllers\Admin\UserchatController::class, 'deleteselectedchat']);

        Route::get('admin/types', [App\Http\Controllers\Admin\BrandsController::class, 'index'])->name('admin/types');
        Route::get('admin/create-types', [App\Http\Controllers\Admin\BrandsController::class, 'create']);
        Route::post('admin/save-types', [App\Http\Controllers\Admin\BrandsController::class, 'store']);
        Route::post('admin/delete-types/', [App\Http\Controllers\Admin\BrandsController::class, 'delete']);
        Route::get('admin/edit-types/{id}', [App\Http\Controllers\Admin\BrandsController::class, 'edit']);
        Route::post('admin/update-types/{id}', [App\Http\Controllers\Admin\BrandsController::class, 'update']);

        Route::get('admin/types/{id}', [App\Http\Controllers\Admin\BrandsController::class, 'subcategory_brands']);
        Route::post('admin/sub-delete-types/', [App\Http\Controllers\Admin\BrandsController::class, 'sub_delete']);

        Route::get('admin/search-featured-listings', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'index'])->name('admin/search-featured-listings');
        Route::get('admin/create-search-featured-listings', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'create']);
        Route::post('admin/save-search-featured-listings', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'store']);
        Route::post('admin/delete-search-featured-listings/', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'delete']);
        Route::post('delete-searh-featured-listings-all',[App\Http\Controllers\Admin\SearchfeaturedController::class, 'deleteall']);
        Route::get('admin/edit-search-featured-listings/{id}', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'edit']);
        Route::post('admin/update-search-featured-listings/{id}', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'update']);

        Route::get('admin/purchases-search-featured-listings', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'purchasesindex']);
        Route::get('admin/purchases-create-search-featured-listings', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'purchasescreate']);
        Route::post('admin/purchases-save-search-featured-listings', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'purchasesstore']);
        Route::post('admin/purchases-delete-search-featured-listings/', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'purchasesdelete']);
        Route::post('admin/delete-purchases-fl-all',[App\Http\Controllers\Admin\SearchfeaturedController::class, 'deleteall']);
        Route::get('admin/purchases-edit-search-featured-listings/{id}', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'purchasesedit']);
        Route::post('admin/purchases-update-search-featured-listings/{id}', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'purchasesupdate']);

        Route::post('admin/approve-search-plans/', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'approve']);
        Route::post('admin/reject-search-plans/', [App\Http\Controllers\Admin\SearchfeaturedController::class, 'reject_search_plans']);

        Route::get('admin/category-featured-listings', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'index'])->name('admin/category-featured-listings');
        Route::get('admin/create-category-featured-listings', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'create']);
        Route::post('admin/save-category-featured-listings', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'store']);
        Route::post('admin/delete-category-featured-listings/', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'delete']);
        Route::post('delete-category-featured-listings-all', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'deleteall']);
        Route::get('admin/edit-category-featured-listings/{id}', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'edit']);
        Route::post('admin/update-category-featured-listings/{id}', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'update']);

        Route::post('admin/approve-category-plans/', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'approve']);
        Route::post('admin/reject-category-plans/', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'reject']);

        Route::get('admin/purchases-category-featured-listings', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'purchasesindex']);
        Route::get('admin/purchases-create-category-featured-listings', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'purchasescreate']);
        Route::post('admin/purchases-save-category-featured-listings', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'purchasesstore']);
        Route::post('admin/purchases-delete-category-featured-listings/', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'purchasesdelete']);
        Route::get('admin/purchases-edit-category-featured-listings/{id}', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'purchasesedit']);
        Route::post('admin/purchases-update-category-featured-listings/{id}', [App\Http\Controllers\Admin\CategoryfeaturedController::class, 'purchasesupdate']);

        Route::get('admin/type-featured-listings', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'index'])->name('admin/brand-featured-listings');
        Route::get('admin/create-type-featured-listings', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'create']);
        Route::post('admin/save-type-featured-listings', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'store']);
        Route::post('admin/delete-type-featured-listings/', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'delete']);
        Route::post('delete-type-featured-listings-all', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'deleteall']);
        Route::get('admin/edit-type-featured-listings/{id}', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'edit']);
        Route::post('admin/update-type-featured-listings/{id}', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'update']);

        Route::post('admin/approve-type-plans/', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'approve']);
        Route::post('admin/reject-type-plans/', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'reject']);

        Route::get('admin/purchases-type-featured-listings', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'purchasesindex']);
        Route::get('admin/purchases-create-brand-featured-listings', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'purchasescreate']);
        Route::post('admin/purchases-save-brand-featured-listings', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'purchasesstore']);
        Route::post('admin/purchases-delete-brand-featured-listings/', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'purchasesdelete']);
        Route::get('admin/purchases-edit-brand-featured-listings/{id}', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'purchasesedit']);
        Route::post('admin/purchases-update-brand-featured-listings/{id}', [App\Http\Controllers\Admin\BrandfeaturedController::class, 'purchasesupdate']);

        Route::get('admin/shop-featured-listings', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'index'])->name('admin/shop-featured-listings');
        Route::get('admin/create-shop-featured-listings', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'create']);
        Route::post('admin/save-shop-featured-listings', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'store']);
        Route::post('admin/delete-shop-featured-listings/', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'delete']);
        Route::post('delete-shop-featured-listings-all', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'deleteall']);
        Route::get('admin/edit-shop-featured-listings/{id}', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'edit']);
        Route::post('admin/update-shop-featured-listings/{id}', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'update']);

        Route::post('admin/approve-shop-plans/', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'approve']);
        Route::post('admin/reject-shop-plans/', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'approve']);

        Route::get('admin/purchases-shop-featured-listings', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'purchasesindex']);
        Route::get('admin/purchases-create-shop-featured-listings', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'purchasescreate']);
        Route::post('admin/purchases-save-shop-featured-listings', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'purchasesstore']);
        Route::post('admin/purchases-delete-shop-featured-listings/', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'purchasesdelete']);
        Route::get('admin/purchases-edit-shop-featured-listings/{id}', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'purchasesedit']);
        Route::post('admin/purchases-update-shop-featured-listings/{id}', [App\Http\Controllers\Admin\ShopfeaturedController::class, 'purchasesupdate']);

        Route::get('admin/hot-featured-listings', [App\Http\Controllers\Admin\HotfeaturedController::class, 'index']);
        Route::get('admin/create-hot-featured-listings', [App\Http\Controllers\Admin\HotfeaturedController::class, 'create']);
        Route::post('admin/save-hot-featured-listings', [App\Http\Controllers\Admin\HotfeaturedController::class, 'store']);
        Route::post('admin/delete-hot-featured-listings/', [App\Http\Controllers\Admin\HotfeaturedController::class, 'delete']);
        Route::get('admin/edit-hot-featured-listings/{id}', [App\Http\Controllers\Admin\HotfeaturedController::class, 'edit']);
        Route::post('admin/update-hot-featured-listings/{id}', [App\Http\Controllers\Admin\HotfeaturedController::class, 'update']);

        Route::post('admin/approve-hot-plans/', [App\Http\Controllers\Admin\HotfeaturedController::class, 'approve']);

        Route::get('admin/purchases-hot-featured-listings', [App\Http\Controllers\Admin\HotfeaturedController::class, 'purchasesindex']);
        Route::get('admin/purchases-create-hot-featured-listings', [App\Http\Controllers\Admin\HotfeaturedController::class, 'purchasescreate']);
        Route::post('admin/purchases-save-hot-featured-listings', [App\Http\Controllers\Admin\HotfeaturedController::class, 'purchasesstore']);
        Route::post('admin/purchases-delete-hot-featured-listings/', [App\Http\Controllers\Admin\HotfeaturedController::class, 'purchasesdelete']);
        Route::get('admin/purchases-edit-hot-featured-listings/{id}', [App\Http\Controllers\Admin\HotfeaturedController::class, 'purchasesedit']);
        Route::post('admin/purchases-update-hot-featured-listings/{id}', [App\Http\Controllers\Admin\HotfeaturedController::class, 'purchasesupdate']);

        Route::get('admin/banner-slots', [App\Http\Controllers\Admin\BannerslotsController::class, 'index'])->name('admin/banner-slots');
        Route::get('admin/create-banner-slots', [App\Http\Controllers\Admin\BannerslotsController::class, 'create']);
        Route::post('admin/save-banner-slots', [App\Http\Controllers\Admin\BannerslotsController::class, 'store']);
        Route::post('admin/delete-banner-slots/', [App\Http\Controllers\Admin\BannerslotsController::class, 'delete']);
        Route::post('delete-banner-slots-all',[App\Http\Controllers\Admin\BannerslotsController::class, 'deleteall']);
        Route::get('admin/edit-banner-slots/{id}', [App\Http\Controllers\Admin\BannerslotsController::class, 'edit']);
        Route::post('admin/update-banner-slots/{id}', [App\Http\Controllers\Admin\BannerslotsController::class, 'update']);

        Route::get('admin/purchases-bump-up-ads', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'index']);
        Route::get('admin/create-purchases-bump-up-ads', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'create']);
        Route::post('admin/save-purchases-bump-up-ads', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'store']);
        Route::post('admin/delete-purchases-bump-up-ads/', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'delete']);
        Route::post('delete-bump-up-all', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'deleteall']);
        Route::get('admin/edit-purchases-bump-up-ads/{id}', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'edit']);
        Route::post('admin/update-purchases-bump-up-ads/{id}', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'update']);

        Route::post('admin/approve-bumpup-plans/', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'approve']);
        Route::post('admin/reject-bumpup-plans/', [App\Http\Controllers\Admin\PurchasesbumpplansController::class, 'reject']);

        Route::get('admin/all-random-purchases-services', [App\Http\Controllers\Admin\RandompurchasesservicesController::class, 'index']);
        Route::get('admin/create-random-purchases-services', [App\Http\Controllers\Admin\RandompurchasesservicesController::class, 'create']);
        Route::post('admin/save-random-purchases-services', [App\Http\Controllers\Admin\RandompurchasesservicesController::class, 'store']);
        Route::post('admin/delete-random-purchases-services/', [App\Http\Controllers\Admin\RandompurchasesservicesController::class, 'delete']);
        Route::get('admin/edit-random-purchases-services/{id}', [App\Http\Controllers\Admin\RandompurchasesservicesController::class, 'edit']);
        Route::post('admin/update-random-purchases-services/{id}', [App\Http\Controllers\Admin\RandompurchasesservicesController::class, 'update']);

        Route::get('admin/all-featured-listings', [App\Http\Controllers\Admin\FeaturedlistingsController::class, 'index']);
        Route::get('admin/create-featured-listings', [App\Http\Controllers\Admin\FeaturedlistingsController::class, 'create']);
        Route::post('admin/save-featured-listings', [App\Http\Controllers\Admin\FeaturedlistingsController::class, 'store']);
        Route::post('admin/delete-featured-listings/', [App\Http\Controllers\Admin\FeaturedlistingsController::class, 'delete']);
        Route::get('admin/edit-featured-listings/{id}', [App\Http\Controllers\Admin\FeaturedlistingsController::class, 'edit']);
        Route::post('admin/update-featured-listings/{id}', [App\Http\Controllers\Admin\FeaturedlistingsController::class, 'update']);

        Route::get('admin/all-banner-ads/{id}', [App\Http\Controllers\Admin\BanneradsController::class, 'index']);
        Route::get('admin/create-banner-ads', [App\Http\Controllers\Admin\BanneradsController::class, 'create']);
        Route::post('admin/save-banner-ads', [App\Http\Controllers\Admin\BanneradsController::class, 'store']);
        Route::post('admin/delete-banner-ads/', [App\Http\Controllers\Admin\BanneradsController::class, 'delete']);
        Route::post("delete-all-banner-ads-all",[App\Http\Controllers\Admin\BanneradsController::class, 'deleteall']);
        Route::get('admin/edit-banner-ads/{id}', [App\Http\Controllers\Admin\BanneradsController::class, 'edit']);
        Route::post('admin/update-banner-ads/{id}', [App\Http\Controllers\Admin\BanneradsController::class, 'update']);

        Route::post('admin/get-bannerslots', [App\Http\Controllers\Admin\BanneradsController::class, 'get_bannerslots']);

        Route::get('admin/purchases-banner-ads', [App\Http\Controllers\Admin\BanneradsController::class, 'purchasesindex']);
        Route::get('admin/create-purchases-banner-ads', [App\Http\Controllers\Admin\BanneradsController::class, 'purchasescreate']);
        Route::post('admin/save-purchases-banner-ads', [App\Http\Controllers\Admin\BanneradsController::class, 'purchasesstore']);
        Route::post('admin/delete-purchases-banner-ads/', [App\Http\Controllers\Admin\BanneradsController::class, 'purchasesdelete']);
        Route::get('admin/edit-purchases-banner-ads/{id}', [App\Http\Controllers\Admin\BanneradsController::class, 'purchasesedit']);
        Route::post('admin/update-purchases-banner-ads/{id}', [App\Http\Controllers\Admin\BanneradsController::class, 'purchasesupdate']);

        Route::post('admin/approve-banner-plans/', [App\Http\Controllers\Admin\BanneradsController::class, 'approve_banner_plans']);
        Route::post('admin/reject-banner-plans/', [App\Http\Controllers\Admin\BanneradsController::class, 'reject_banner_plans']);

        Route::get('admin/attributes', [App\Http\Controllers\Admin\AllattributesController::class, 'index'])->name('admin/attributes');
        Route::get('admin/create-attributes', [App\Http\Controllers\Admin\AllattributesController::class, 'create']);
        Route::post('admin/save-attributes', [App\Http\Controllers\Admin\AllattributesController::class, 'store']);
        Route::post('admin/delete-attributes/', [App\Http\Controllers\Admin\AllattributesController::class, 'delete']);
        Route::post('delete-attribute-all',[App\Http\Controllers\Admin\AllattributesController::class, 'deleteall']);
        Route::get('admin/edit-attributes/{id}', [App\Http\Controllers\Admin\AllattributesController::class, 'edit']);
        Route::post('admin/update-attributes/{id}', [App\Http\Controllers\Admin\AllattributesController::class, 'update']);
        
        
        Route::get('admin/transactions', [App\Http\Controllers\Admin\TransactionsController::class, 'index']);

        Route::get('admin/contact-list', [App\Http\Controllers\Admin\ContactController::class, 'index']);
        Route::post('delete-contact-all', [App\Http\Controllers\Admin\ContactController::class, 'deleteall']);
        
        Route::get('admin/userlogs-list', [App\Http\Controllers\Admin\ContactController::class, 'userlogs']);

        //brand attributes
        Route::get('view-type-attributes/{brand_id}', [App\Http\Controllers\Admin\AllattributesController::class, 'getBrandAttributes']);
        Route::get('edit-type-attributes/{brand_id}', [App\Http\Controllers\Admin\AllattributesController::class, 'editBrandAttributes']);

        //Categories
        Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories');
        Route::get('create-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
        Route::post('store-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
        Route::post('update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::post('delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);
        Route::post('delete-category-selected',[App\Http\Controllers\Admin\CategoryController::class, 'selecteddelete']);

        //Sub Categories
        Route::get('sub-categories/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'index']);
        Route::get('create-sub-category/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'create']);
        Route::post('store-sub-category', [App\Http\Controllers\Admin\SubCategoryController::class, 'store']);
        Route::get('edit-sub-category/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'edit_sub']);
        Route::post('update-sub-category/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'update_sub']);
        Route::post('delete-sub-category', [App\Http\Controllers\Admin\SubCategoryController::class, 'delete']);
        Route::post('delete-sub-category-all',[App\Http\Controllers\Admin\SubCategoryController::class, 'deleteallsubcat']);
        Route::post('add-sub-category-attributes', [App\Http\Controllers\Admin\SubCategoryController::class, 'add_sub_category_attributes']);
        //   Route::post('delete-sub-category-attributes', [App\Http\Controllers\Admin\SubCategoryController::class, 'deleteattributes']);
        Route::post('add-sub-category-brands', [App\Http\Controllers\Admin\SubCategoryController::class, 'add_sub_category_brands']);

        //Sub Brands
        Route::get('sub-types/{id}', [App\Http\Controllers\Admin\SubBrandController::class, 'index']);
        Route::get('create-sub-type/{id}', [App\Http\Controllers\Admin\SubBrandController::class, 'create']);
        Route::post('store-sub-type', [App\Http\Controllers\Admin\SubBrandController::class, 'store']);
        Route::get('edit-sub-type/{id}', [App\Http\Controllers\Admin\SubBrandController::class, 'edit_sub']);
        Route::post('update-sub-type/{id}', [App\Http\Controllers\Admin\SubBrandController::class, 'update_sub']);
        Route::post('delete-sub-brand', [App\Http\Controllers\Admin\SubBrandController::class, 'delete']);
        Route::post('add-sub-brand-attributes', [App\Http\Controllers\Admin\SubBrandController::class, 'add_sub_brand_attributes']);
        Route::post('add-type-attributes', [App\Http\Controllers\Admin\SubBrandController::class, 'add_brand_attributes']);
        Route::post('add-sub-brand', [App\Http\Controllers\Admin\SubBrandController::class, 'add_sub_brand']);

        //Attributes
        Route::get('attributes/{id}/', [App\Http\Controllers\Admin\AttributeController::class, 'index']);
        Route::get('sub-type-attributes/{id}/', [App\Http\Controllers\Admin\AttributeController::class, 'getSubBrandAttributes']);
        Route::post('delete-subbrand-attribute', [App\Http\Controllers\Admin\AttributeController::class, 'deleteSubBrandAttributes']);

        Route::get('create-attribute/{id}', [App\Http\Controllers\Admin\AttributeController::class, 'create']);
        Route::post('store-attribute', [App\Http\Controllers\Admin\AttributeController::class, 'store']);
        Route::get('edit-attribute/{id}', [App\Http\Controllers\Admin\AttributeController::class, 'edit']);
        Route::post('update-attribute/{id}', [App\Http\Controllers\Admin\AttributeController::class, 'update']);
        Route::post('delete-attribute', [App\Http\Controllers\Admin\AttributeController::class, 'delete']);
        Route::post('delete-all-attribute',[App\Http\Controllers\Admin\AttributeController::class, 'deleteall']);
        Route::post('update-brand-attributes', [App\Http\Controllers\Admin\AllattributesController::class, 'updateBrandAttributes']);
        Route::post('delete-brand-attribute', [App\Http\Controllers\Admin\AllattributesController::class, 'deleteBrandAttributes']);

        //Properties
        Route::get('properties/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'index']);
        Route::get('create-property/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'create']);
        Route::post('store-property', [App\Http\Controllers\Admin\PropertyController::class, 'store']);
        Route::get('edit-property/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'edit']);
        Route::post('update-property/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'update']);
        Route::post('delete-property', [App\Http\Controllers\Admin\PropertyController::class, 'delete']);

        //Web Settings
        Route::get('header-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'headerSetting']);
        Route::post('edit-header-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'headerEdit']);

        Route::get('sms-email-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'smsEmailSetting']);
        Route::post('sms', [App\Http\Controllers\Admin\WebSettingsController::class, 'sms']);
        Route::post('email', [App\Http\Controllers\Admin\WebSettingsController::class, 'email']);

        Route::get('footer-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'footerSetting']);
        Route::post('edit-footer-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'footerEdit']);

        Route::get('admin/sell-now-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'sell_now_setting']);
        Route::post('update-sell-now-field', [App\Http\Controllers\Admin\WebSettingsController::class, 'update_sell_now_field']);

        Route::get('coin-wallet-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'coinWalletSetting']);
        Route::post('coin-wallet-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'coinWalletSettingSave']);
        
        Route::get('deposit-limit-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'depositLimitSetting']);
        Route::post('deposit-limit-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'depositLimitSettingSave']);

        //Sliders
        Route::get('slider', [App\Http\Controllers\Admin\SliderController::class, 'index']);
        Route::get('create-slider', [App\Http\Controllers\Admin\SliderController::class, 'create']);
        Route::post('store-slider', [App\Http\Controllers\Admin\SliderController::class, 'store']);
        Route::get('edit-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
        Route::post('update-slider/{id}', [App\Http\Controllers\Admin\SliderController::class, 'update']);
        Route::post('delete-slider', [App\Http\Controllers\Admin\SliderController::class, 'delete']);
        Route::post('delete-sliders-all',[App\Http\Controllers\Admin\SliderController::class, 'deleteall']);

        Route::get('application-slider', [App\Http\Controllers\Admin\ApplicationController::class, 'index']);
        Route::get('create-application-slider', [App\Http\Controllers\Admin\ApplicationController::class, 'create']);
        Route::post('store-application-slider', [App\Http\Controllers\Admin\ApplicationController::class, 'store']);
        Route::get('edit-application-slider/{id}', [App\Http\Controllers\Admin\ApplicationController::class, 'edit']);
        Route::post('update-application-slider/{id}', [App\Http\Controllers\Admin\ApplicationController::class, 'update']);
        Route::post('delete-application-slider', [App\Http\Controllers\Admin\ApplicationController::class, 'delete']);
        Route::post('delete-slider-all', [App\Http\Controllers\Admin\ApplicationController::class, 'deleteall']);

        Route::get('admin/faq-category', [App\Http\Controllers\Admin\FaqcategoryController::class, 'index'])->name('admin/faq-category');
        Route::get('admin/faq-category-create', [App\Http\Controllers\Admin\FaqcategoryController::class, 'create']);
        Route::post('admin/faq-category-store', [App\Http\Controllers\Admin\FaqcategoryController::class, 'store']);
        Route::get('admin/faq-category-edit/{id}', [App\Http\Controllers\Admin\FaqcategoryController::class, 'edit']);
        Route::post('admin/faq-category-update/{id}', [App\Http\Controllers\Admin\FaqcategoryController::class, 'update']);
        Route::post('admin/faq-category-delete', [App\Http\Controllers\Admin\FaqcategoryController::class, 'delete']);
        
        Route::get('ads-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'adsSetting']);
        Route::post('ads-setting', [App\Http\Controllers\Admin\WebSettingsController::class, 'saveAdsSetting']);

