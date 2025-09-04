# IDE 配置说明

## 问题解决

你的代码编辑器中的红色波浪线已经通过以下方式解决：

### 1. WordPress 函数存根文件
- 创建了 `wordpress-stubs.php` 文件
- 包含了所有常用的 WordPress 核心函数定义
- 让 IDE 能够识别 WordPress 函数，消除"未定义函数"警告

### 2. 自动加载配置
- 在 `functions.php` 中添加了自动加载存根文件的代码
- 确保在 WordPress 环境中不会重复定义函数

### 3. VS Code 配置
- 创建了 `.vscode/settings.json` 配置文件
- 优化了 PHP 语言服务器的设置
- 启用了 WordPress 相关的智能提示

## 文件说明

- `wordpress-stubs.php` - WordPress 函数存根定义
- `.vscode/settings.json` - VS Code 编辑器配置
- `functions.php` - 已修改，自动加载存根文件

## 已覆盖的WordPress函数

### 核心模板函数
- `get_header()` - 加载头部模板
- `get_footer()` - 加载底部模板
- `get_sidebar()` - 加载侧边栏模板
- `get_template_part()` - 加载模板部分

### 内容显示函数
- `the_post()` - 循环中的文章迭代
- `have_posts()` - 检查是否有文章
- `get_post_type()` - 获取文章类型
- `single_post_title()` - 显示单篇文章标题
- `the_archive_title()` - 显示归档标题
- `the_archive_description()` - 显示归档描述

### 导航函数
- `wp_nav_menu()` - 显示导航菜单
- `the_posts_navigation()` - 显示文章导航
- `the_post_navigation()` - 显示单篇文章导航

### 信息获取函数
- `bloginfo()` - 获取网站信息
- `get_bloginfo()` - 获取网站信息（返回值）
- `home_url()` - 获取首页URL
- `get_option()` - 获取WordPress选项

### 条件判断函数
- `is_front_page()` - 是否为首页
- `is_home()` - 是否为博客首页
- `is_singular()` - 是否为单篇文章/页面
- `is_customize_preview()` - 是否为自定义预览
- `comments_open()` - 评论是否开放

### 安全输出函数
- `esc_html_e()` - 转义并显示HTML
- `esc_html__()` - 转义HTML（返回值）
- `esc_url()` - 转义URL

### 其他常用函数
- `language_attributes()` - 语言属性
- `body_class()` - 页面body类
- `wp_head()` - WordPress头部钩子
- `wp_body_open()` - WordPress body开始钩子
- `the_custom_logo()` - 自定义Logo
- `get_search_form()` - 搜索表单
- `the_widget()` - 显示小工具
- `wp_list_categories()` - 分类列表
- `convert_smilies()` - 转换表情符号
- `get_comments_number()` - 获取评论数量
- `comments_template()` - 评论模板

## 注意事项

1. 这些存根文件只在开发环境中使用，不会影响 WordPress 的实际运行
2. 如果添加新的 WordPress 函数，可以在 `wordpress-stubs.php` 中添加相应的存根定义
3. 建议定期更新存根文件以包含最新的 WordPress 函数
4. 所有你主题中使用的WordPress函数现在都不会报"未定义函数"错误

## 其他编辑器支持

如果你使用其他编辑器（如 PhpStorm），可以：
1. 安装 WordPress 插件
2. 配置 PHP 解释器路径指向 WordPress 安装目录
3. 启用 WordPress 相关的代码检查规则
