# HaoYu AI WordPress 子主题

## 简介

这是一个基于 GeneratePress 的 WordPress 子主题，专为 HaoYu AI 网站设计。

## 架构说明

### 主题职责
- 定义设计变量（CSS 自定义属性）
- 调整 WordPress 默认元素样式
- 微调 GeneratePress 主题的 Header/Footer
- 添加主题激活标识

### 插件职责
- 插件应该有自己独立的样式系统
- 可以使用主题定义的 CSS 变量来保持视觉一致性
- 但不依赖主题的具体组件样式

## 设计变量

主题定义了一套完整的设计变量，插件可以使用这些变量：

```css
/* 颜色 */
--haoyu-color-primary: #7b6cff;
--haoyu-color-secondary: #5d6bff;
--haoyu-text: #1d1f23;
--haoyu-text-muted: #5a6371;

/* 间距 */
--haoyu-spacing-sm: 12px;
--haoyu-spacing-md: 16px;
--haoyu-spacing-lg: 24px;

/* 圆角 */
--haoyu-radius-md: 12px;
--haoyu-radius-lg: 16px;

/* 阴影 */
--haoyu-shadow-sm: 0 4px 12px rgba(20, 20, 43, 0.06);
```

## 插件开发建议

### 1. 使用设计变量
```css
.your-plugin-component {
  color: var(--haoyu-color-primary);
  border-radius: var(--haoyu-radius-md);
  box-shadow: var(--haoyu-shadow-sm);
}
```

### 2. 自定义组件样式
插件应该定义自己的组件样式，例如：

```css
.your-plugin-card {
  background: #fff;
  border: 1px solid var(--haoyu-border);
  border-radius: var(--haoyu-radius-lg);
  padding: var(--haoyu-spacing-lg);
}

.your-plugin-btn {
  background: var(--haoyu-button-gradient);
  border-radius: var(--haoyu-radius-md);
  padding: 12px 20px;
}
```

### 3. 保持独立性
- 插件不依赖主题的具体实现
- 插件有自己完整的样式文件
- 通过 CSS 变量保持视觉一致性

## 开发流程

1. 修改 `src/scss/main.scss`
2. 运行 `npm run build` 编译
3. 样式会输出到 `dist/main.css`
4. WordPress 自动加载编译后的文件

## 文件结构

```
src/
├── scss/
│   └── main.scss          # 主题样式文件
├── main.js                # JavaScript 入口
└── ...

dist/                      # 编译输出目录
├── main.css              # 编译后的 CSS
└── main.js               # 编译后的 JS
```
