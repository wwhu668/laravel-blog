# laravel-blog
laravel-blog

# 欢迎查看 wwhu668/laravel-blog 项目总结

------
## 数据结构

### 1.users 用户表
| Field          | Type              | Null | Key | Default             | Extra          |
|----------------|-------------------|------|-----|---------------------|----------------|
| id             | int(10) unsigned  | NO   | PRI | NULL                | auto_increment |
| name           | varchar(255)      | NO   |     | NULL                |                |
| email          | varchar(255)      | NO   | UNI | NULL                |                |
| password       | varchar(60)       | NO   |     | NULL                |                |
| level          | enum('0','1','2') | NO   |     | 0                   |                |
| remember_token | varchar(100)      | YES  |     | NULL                |                |
| created_at     | timestamp         | NO   |     | 0000-00-00 00:00:00 |                |
| updated_at     | timestamp         | NO   |     | 0000-00-00 00:00:00 |                |

### 2.password_resets 找回密码表
| Field      | Type         | Null | Key | Default             | Extra |
|------------|--------------|------|-----|---------------------|-------|
| email      | varchar(255) | NO   | MUL | NULL                |       |
| token      | varchar(255) | NO   | MUL | NULL                |       |
| created_at | timestamp    | NO   |     | 0000-00-00 00:00:00 |       |

### 3.articles 文章表
| Field        | Type             | Null | Key | Default             | Extra          |
|--------------|------------------|------|-----|---------------------|----------------|
| id           | int(10) unsigned | NO   | PRI | NULL                | auto_increment |
| user_id      | int(10) unsigned | NO   | MUL | NULL                |                |
| category_id  | int(10) unsigned | NO   |     | NULL                |                |
| title        | varchar(255)     | NO   |     | NULL                |                |
| intro        | text             | NO   |     | NULL                |                |
| body         | text             | NO   |     | NULL                |                |
| excerpt      | text             | YES  |     | NULL                |                |
| created_at   | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
| updated_at   | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
| published_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |

### 4.tags 标签表
| Field      | Type             | Null | Key | Default             | Extra          |
|------------|------------------|------|-----|---------------------|----------------|
| id         | int(10) unsigned | NO   | PRI | NULL                | auto_increment |
| name       | varchar(255)     | NO   | UNI | NULL                |                |
| created_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
| updated_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |

### 5.article_tag 文章-标签关联表
| Field      | Type             | Null | Key | Default             | Extra |
|------------|------------------|------|-----|---------------------|-------|
| article_id | int(10) unsigned | NO   | MUL | NULL                |       |
| tag_id     | int(10) unsigned | NO   | MUL | NULL                |       |
| created_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |       |
| updated_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |       |


### 6.categorys 分类表
| Field      | Type                | Null | Key | Default             | Extra          |
|------------|---------------------|------|-----|---------------------|----------------|
| id         | int(10) unsigned    | NO   | PRI | NULL                | auto_increment |
| name       | varchar(255)        | NO   |     | NULL                |                |
| pid        | int(11)             | NO   |     | 0                   |                |
| order      | tinyint(3) unsigned | NO   |     | NULL                |                |
| created_at | timestamp           | NO   |     | 0000-00-00 00:00:00 |                |
| updated_at | timestamp           | NO   |     | 0000-00-00 00:00:00 |                |

### 7.comments 评论表
| Field      | Type             | Null | Key | Default             | Extra          |
|------------|------------------|------|-----|---------------------|----------------|
| id         | int(10) unsigned | NO   | PRI | NULL                | auto_increment |
| article_id | int(11)          | NO   |     | NULL                |                |
| username   | varchar(255)     | NO   |     | NULL                |                |
| email      | varchar(255)     | NO   |     | NULL                |                |
| url        | varchar(255)     | NO   |     | NULL                |                |
| parent_id  | int(11)          | NO   |     | 0                   |                |
| content    | text             | NO   |     | NULL                |                |
| created_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
| updated_at | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |


------
## URL 访问 路由表
| Method                         | URI                                                   | Name                   | Action                                                     | Middleware |
|--------------------------------|-------------------------------------------------------|------------------------|------------------------------------------------------------|------------|
| GET\|HEAD                       | /                                                     |                        | App\Http\Controllers\HomeController@index                  |            |
| GET\|HEAD                       | admin                                                 |                        | App\Http\Controllers\Admin\DashboardController@index       | auth       |
| GET\|HEAD                       | admin/article                                         | admin.article.index    | App\Http\Controllers\Admin\ArticleController@index         | auth       |
| POST                           | admin/article                                         | admin.article.store    | App\Http\Controllers\Admin\ArticleController@store         | auth       |
| GET\|HEAD                       | admin/article/create                                  | admin.article.create   | App\Http\Controllers\Admin\ArticleController@create        | auth       |
| GET\|HEAD                       | admin/article/{article}                               | admin.article.show     | App\Http\Controllers\Admin\ArticleController@show          | auth       |
| PATCH                          | admin/article/{article}                               |                        | App\Http\Controllers\Admin\ArticleController@update        | auth       |
| DELETE                         | admin/article/{article}                               | admin.article.destroy  | App\Http\Controllers\Admin\ArticleController@destroy       | auth       |
| PUT                            | admin/article/{article}                               | admin.article.update   | App\Http\Controllers\Admin\ArticleController@update        | auth       |
| GET\|HEAD                       | admin/article/{article}/edit                          | admin.article.edit     | App\Http\Controllers\Admin\ArticleController@edit          | auth       |
| GET\|HEAD                       | admin/category                                        | admin.category.index   | App\Http\Controllers\Admin\CategoryController@index        | auth       |
| POST                           | admin/category                                        | admin.category.store   | App\Http\Controllers\Admin\CategoryController@store        | auth       |
| GET\|HEAD                       | admin/category/create                                 | admin.category.create  | App\Http\Controllers\Admin\CategoryController@create       | auth       |
| PATCH                          | admin/category/{category}                             |                        | App\Http\Controllers\Admin\CategoryController@update       | auth       |
| DELETE                         | admin/category/{category}                             | admin.category.destroy | App\Http\Controllers\Admin\CategoryController@destroy      | auth       |
| PUT                            | admin/category/{category}                             | admin.category.update  | App\Http\Controllers\Admin\CategoryController@update       | auth       |
| GET\|HEAD                       | admin/category/{category}                             | admin.category.show    | App\Http\Controllers\Admin\CategoryController@show         | auth       |
| GET\|HEAD                       | admin/category/{category}/edit                        | admin.category.edit    | App\Http\Controllers\Admin\CategoryController@edit         | auth       |
| GET\|HEAD                       | admin/comment                                         |                        | App\Http\Controllers\Admin\CommentController@index         | auth       |
| GET\|HEAD                       | admin/setup                                           |                        | App\Http\Controllers\Admin\SetupController@index           | auth       |
| POST                           | admin/setup/store                                     |                        | App\Http\Controllers\Admin\SetupController@store           | auth       |
| GET\|HEAD                       | admin/tag                                             | admin.tag.index        | App\Http\Controllers\Admin\TagController@index             | auth       |
| POST                           | admin/tag                                             | admin.tag.store        | App\Http\Controllers\Admin\TagController@store             | auth       |
| GET\|HEAD                       | admin/tag/create                                      | admin.tag.create       | App\Http\Controllers\Admin\TagController@create            | auth       |
| PATCH                          | admin/tag/{tag}                                       |                        | App\Http\Controllers\Admin\TagController@update            | auth       |
| DELETE                         | admin/tag/{tag}                                       | admin.tag.destroy      | App\Http\Controllers\Admin\TagController@destroy           | auth       |
| PUT                            | admin/tag/{tag}                                       | admin.tag.update       | App\Http\Controllers\Admin\TagController@update            | auth       |
| GET\|HEAD                       | admin/tag/{tag}                                       | admin.tag.show         | App\Http\Controllers\Admin\TagController@show              | auth       |
| GET\|HEAD                       | admin/tag/{tag}/edit                                  | admin.tag.edit         | App\Http\Controllers\Admin\TagController@edit              | auth       |
| POST                           | admin/upload/img                                      |                        | App\Http\Controllers\Admin\UploadFileController@postImg    | auth       |
| POST                           | admin/user                                            | admin.user.store       | App\Http\Controllers\Admin\UserController@store            | auth       |
| GET\|HEAD                       | admin/user                                            | admin.user.index       | App\Http\Controllers\Admin\UserController@index            | auth       |
| GET\|HEAD                       | admin/user/create                                     | admin.user.create      | App\Http\Controllers\Admin\UserController@create           | auth       |
| GET\|HEAD                       | admin/user/{user}                                     | admin.user.show        | App\Http\Controllers\Admin\UserController@show             | auth       |
| DELETE                         | admin/user/{user}                                     | admin.user.destroy     | App\Http\Controllers\Admin\UserController@destroy          | auth       |
| PATCH                          | admin/user/{user}                                     |                        | App\Http\Controllers\Admin\UserController@update           | auth       |
| PUT                            | admin/user/{user}                                     | admin.user.update      | App\Http\Controllers\Admin\UserController@update           | auth       |
| GET\|HEAD                       | admin/user/{user}/edit                                | admin.user.edit        | App\Http\Controllers\Admin\UserController@edit             | auth       |
| GET| auth/{_missing}                                       |                        | App\Http\Controllers\Auth\AuthController@missingMethod     | guest      |
| GET\|HEAD                       | feed                                                  |                        | App\Http\Controllers\Admin\ArticleController@feed          |            |
| POST                           | home                                                  | home.store             | App\Http\Controllers\HomeController@store                  |            |
| GET\|HEAD                       | home                                                  | home.index             | App\Http\Controllers\HomeController@index                  |            |
| POST                           | home/comment/store                                    | comment.store          | App\Http\Controllers\CommentController@store               |            |
| GET\|HEAD                       | home/create                                           | home.create            | App\Http\Controllers\HomeController@create                 |            |
| PATCH                          | home/{home}                                           |                        | App\Http\Controllers\HomeController@update                 |            |
| PUT                            | home/{home}                                           | home.update            | App\Http\Controllers\HomeController@update                 |            |
| GET\|HEAD                       | home/{home}                                           | home.show              | App\Http\Controllers\HomeController@show                   |            |
| DELETE                         | home/{home}                                           | home.destroy           | App\Http\Controllers\HomeController@destroy                |            |
| GET\|HEAD                       | home/{home}/author                                    | home.author            | App\Http\Controllers\HomeController@author                 |            |
| GET\|HEAD                       | home/{home}/category                                  | home.category          | App\Http\Controllers\HomeController@category               |            |
| GET\|HEAD                       | home/{home}/edit                                      | home.edit              | App\Http\Controllers\HomeController@edit                   |            |
| GET\|HEAD                       | home/{home}/tag                                       | home.tag               | App\Http\Controllers\HomeController@tag                    |            |
| GET| password/{_missing}                                   |                        | App\Http\Controllers\Auth\PasswordController@missingMethod | guest      |
| GET\|HEAD                       | search                                                | search                 | App\Http\Controllers\HomeController@search                 |            |
| GET\|HEAD                       | sidebar                                               |                        | Closure                                                    |            |
| GET\|HEAD                       | sitemap                                               |                        | App\Http\Controllers\Admin\ArticleController@sitemap       |            |



------
## 配置
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=nQGoH7GcJRyxsqHjmF6R5wdx8QZVlktj

DB_HOST=192.168.33.10
DB_DATABASE=blog
DB_USERNAME=myuser
DB_PASSWORD=123456

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=smtp
MAIL_HOST=smtp.163.com
MAIL_PORT=25
MAIL_USERNAME=wuwenhu940226@163.com
MAIL_PASSWORD=hwxvceusgnaentqh
MAIL_ENCRYPTION=null
MAIL_TITLE=test
```

------
## 扩展类库
    扩展类库配置 `/composer.json` 文件中，配置好后 `composer install` 安装
------
