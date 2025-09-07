# WordPress CSS 类名约定详解

## has- 前缀的含义

### 1. **语义化标识**
`has-` 前缀表示"具有某种属性"，这是一种语义化的 CSS 类名约定：

```css
/* 表示"具有主色调" */
.has-primary-color { color: var(--wp--preset--color--primary); }

/* 表示"具有主色调背景" */
.has-primary-background-color { background-color: var(--wp--preset--color--primary); }

/* 表示"具有小字体大小" */
.has-small-font-size { font-size: var(--wp--preset--font-size--small); }
```

### 2. **与 HTML 属性对应**
这种命名方式与 HTML 的 `has-*` 属性选择器保持一致：

```html
<!-- HTML 属性选择器 -->
<div class="has-primary-color">文本</div>

<!-- CSS 属性选择器 -->
div[class*="has-primary-color"] { /* 样式 */ }
```

## WordPress 类名系统

### 1. **颜色类名**
```css
/* 文本颜色 */
.has-primary-color { color: var(--wp--preset--color--primary); }
.has-secondary-color { color: var(--wp--preset--color--secondary); }
.has-accent-color { color: var(--wp--preset--color--accent); }

/* 背景颜色 */
.has-primary-background-color { background-color: var(--wp--preset--color--primary); }
.has-secondary-background-color { background-color: var(--wp--preset--color--secondary); }
.has-accent-background-color { background-color: var(--wp--preset--color--accent); }
```

### 2. **字体大小类名**
```css
.has-small-font-size { font-size: var(--wp--preset--font-size--small); }
.has-medium-font-size { font-size: var(--wp--preset--font-size--medium); }
.has-large-font-size { font-size: var(--wp--preset--font-size--large); }
.has-x-large-font-size { font-size: var(--wp--preset--font-size--x-large); }
```

### 3. **间距类名**
```css
.has-xs-spacing { padding: var(--wp--preset--spacing--xs); }
.has-sm-spacing { padding: var(--wp--preset--spacing--sm); }
.has-md-spacing { padding: var(--wp--preset--spacing--md); }
.has-lg-spacing { padding: var(--wp--preset--spacing--lg); }
```

## 为什么使用 has- 前缀？

### 1. **可读性**
```css
/* 清晰表达意图 */
.has-primary-color        /* 具有主色调 */
.has-large-font-size      /* 具有大字体大小 */
.has-md-spacing          /* 具有中等间距 */

/* 对比：没有前缀的命名 */
.primary-color           /* 不够清晰 */
.large-font-size         /* 不够清晰 */
.md-spacing             /* 不够清晰 */
```

### 2. **避免命名冲突**
```css
/* 使用 has- 前缀避免与现有类名冲突 */
.has-primary-color       /* 安全 */
.primary-color          /* 可能与现有 CSS 框架冲突 */
```

### 3. **语义化设计**
```css
/* 表达"状态"或"属性" */
.has-primary-color       /* 具有主色调属性 */
.has-large-font-size     /* 具有大字体大小属性 */
.has-md-spacing         /* 具有中等间距属性 */
```

## 实际应用示例

### 1. **块编辑器中的使用**
```html
<!-- 用户在编辑器中选择了主色调 -->
<p class="has-primary-color">这段文字是主色调</p>

<!-- 用户在编辑器中选择了大字体 -->
<h2 class="has-large-font-size">这是大标题</h2>

<!-- 用户在编辑器中选择了主色调背景 -->
<div class="has-primary-background-color">这是主色调背景</div>
```

### 2. **CSS 中的定义**
```css
/* 主题自动生成这些类 */
.has-primary-color {
  color: var(--wp--preset--color--primary) !important;
}

.has-primary-background-color {
  background-color: var(--wp--preset--color--primary) !important;
}

.has-large-font-size {
  font-size: var(--wp--preset--font-size--large) !important;
}
```

### 3. **JavaScript 中的使用**
```javascript
// 检查元素是否具有特定属性
if (element.classList.contains('has-primary-color')) {
  console.log('这个元素具有主色调');
}

// 动态添加属性
element.classList.add('has-primary-color');
```

## 其他 WordPress 类名约定

### 1. **块相关类名**
```css
.wp-block-paragraph     /* 段落块 */
.wp-block-heading       /* 标题块 */
.wp-block-button        /* 按钮块 */
.wp-block-image         /* 图片块 */
```

### 2. **对齐类名**
```css
.alignleft              /* 左对齐 */
.alignright             /* 右对齐 */
.aligncenter            /* 居中对齐 */
.alignwide              /* 宽对齐 */
.alignfull              /* 全宽对齐 */
```

### 3. **响应式类名**
```css
.has-small-font-size    /* 小字体 */
.has-medium-font-size   /* 中等字体 */
.has-large-font-size    /* 大字体 */
```

## 最佳实践

### 1. **使用标准类名**
```css
/* 推荐：使用 WordPress 标准类名 */
.has-primary-color { color: var(--wp--preset--color--primary); }

/* 不推荐：自定义类名 */
.primary-text { color: var(--wp--preset--color--primary); }
```

### 2. **保持一致性**
```css
/* 保持命名模式一致 */
.has-primary-color
.has-secondary-color
.has-accent-color

.has-small-font-size
.has-medium-font-size
.has-large-font-size
```

### 3. **避免冲突**
```css
/* 使用 has- 前缀避免与现有 CSS 框架冲突 */
.has-primary-color       /* 安全 */
.primary-color          /* 可能与 Bootstrap 等框架冲突 */
```

## 总结

`has-` 前缀的设计用意：

1. **语义化** - 清晰表达"具有某种属性"
2. **可读性** - 提高代码的可读性和理解性
3. **避免冲突** - 防止与现有 CSS 框架的类名冲突
4. **标准化** - 遵循 WordPress 的设计约定
5. **一致性** - 保持整个系统的命名一致性

这种命名约定让 WordPress 的 CSS 类名系统更加清晰、可维护和可扩展！🎨
