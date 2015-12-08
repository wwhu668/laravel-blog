<div id="sidebar" class="sidebar" style="top: 0px;"> 
    <header id="masthead" class="site-header" role="banner"> 
        <div class="site-branding"> 
            <h1 class="site-title"><a href="/" rel="home">{{ $setups->title }}</a></h1> 
            <p class="site-description">{{ $setups->subtitle }}</p> 
            <button class="secondary-toggle">Menu and widgets</button> 
        </div>
        <!-- .site-branding --> 
    </header>
    <!-- .site-header --> 
    <div id="secondary" class="secondary"> 
        <div id="widget-area" class="widget-area" role="complementary"> 
            <aside id="search-2" class="widget widget_search">
                <form role="search" method="get" class="search-form" action="{{ Route('search') }}"> 
                    <label> <span class="screen-reader-text">搜索：</span> <input type="search" class="search-field" placeholder="搜索…" value="" name="search" title="搜索：" /> </label> 
                    <input type="submit" class="search-submit screen-reader-text" value="搜索" /> 
                </form>
            </aside> 


            <aside id="archives-2" class="widget widget_archive">
                <h2 class="widget-title">文章归档</h2> 
                <ul> 
                    <li><a href="">2015年九月</a></li> 
                </ul> 
            </aside> 
            <aside id="categories-2" class="widget widget_categories">
                <h2 class="widget-title">分类目录</h2> 
                <ul> 
                <?php $categorys = \App\Category::all(); ?>
                @foreach ($categorys as $category)
                    <li class="cat-item cat-item-1"><a href="{{ Route('home.category', $category['id']) }}">{{ $category['name'] }}</a> </li> 
                @endforeach
                </ul> 
            </aside>
            <aside id="meta-2" class="widget widget_meta">
                <h2 class="widget-title">功能</h2> 
                <ul> 
                    <li><a href="{{ url('admin') }}">登录</a></li> 
                    <li><a href="{{ url('feed') }}">文章<abbr title="Really Simple Syndication">RSS</abbr></a></li> 
                    <li><a href="https://cn.wordpress.org/" title="基于WordPress，一个优美、先进的个人信息发布平台。">WordPress.org</a></li> 
                </ul> 
            </aside> 
        </div>
        <!-- .widget-area --> 
    </div>
    <!-- .secondary --> 
</div>
<!-- .sidebar --> 
