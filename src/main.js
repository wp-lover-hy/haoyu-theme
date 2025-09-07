/**
 * HaoYu AI Child Theme - Entry Point
 * 
 * 保持GP主题原有功能，通过作用域样式避免冲突
 */

// 导入主题样式
import './scss/main.scss'

// 初始化主题功能
document.addEventListener('DOMContentLoaded', () => {
  console.log('HaoYu AI Child Theme loaded - keeping GP theme intact')
  
  // 当需要时，在此处添加自定义功能
  // 不破坏GP主题的原有功能

  // 透明吸顶 Header：滚动后收敛为更实的磨砂背景
  const header = document.querySelector('.site-header')
  if (header) {
    const onScroll = () => {
      if (window.scrollY > 8) {
        header.classList.add('haoyu-glass-solid')
      } else {
        header.classList.remove('haoyu-glass-solid')
      }
    }
    onScroll()
    window.addEventListener('scroll', onScroll, { passive: true })
  }
})
