/**
 * Utility Functions
 * 
 * Common helper functions used throughout the theme.
 */

/**
 * Debounce function to limit function calls
 * @param {Function} func - Function to debounce
 * @param {number} wait - Wait time in milliseconds
 * @param {boolean} immediate - Execute immediately on first call
 * @returns {Function} Debounced function
 */
export function debounce(func, wait, immediate = false) {
  let timeout
  return function executedFunction(...args) {
    const later = () => {
      timeout = null
      if (!immediate) func(...args)
    }
    const callNow = immediate && !timeout
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
    if (callNow) func(...args)
  }
}

/**
 * Throttle function to limit function calls
 * @param {Function} func - Function to throttle
 * @param {number} limit - Time limit in milliseconds
 * @returns {Function} Throttled function
 */
export function throttle(func, limit) {
  let inThrottle
  return function(...args) {
    if (!inThrottle) {
      func.apply(this, args)
      inThrottle = true
      setTimeout(() => inThrottle = false, limit)
    }
  }
}

/**
 * Check if element is in viewport
 * @param {Element} element - Element to check
 * @param {number} threshold - Visibility threshold (0-1)
 * @returns {boolean} Is element visible
 */
export function isInViewport(element, threshold = 0) {
  const rect = element.getBoundingClientRect()
  const windowHeight = window.innerHeight || document.documentElement.clientHeight
  const windowWidth = window.innerWidth || document.documentElement.clientWidth
  
  return (
    rect.top <= windowHeight * (1 - threshold) &&
    rect.bottom >= windowHeight * threshold &&
    rect.left <= windowWidth &&
    rect.right >= 0
  )
}

/**
 * Smooth scroll to element
 * @param {Element|string} target - Element or selector to scroll to
 * @param {number} offset - Offset from top
 * @param {number} duration - Animation duration
 */
export function smoothScrollTo(target, offset = 0, duration = 800) {
  const element = typeof target === 'string' ? document.querySelector(target) : target
  if (!element) return
  
  const startPosition = window.pageYOffset
  const targetPosition = element.offsetTop - offset
  const distance = targetPosition - startPosition
  let startTime = null
  
  function animation(currentTime) {
    if (startTime === null) startTime = currentTime
    const timeElapsed = currentTime - startTime
    const run = ease(timeElapsed, startPosition, distance, duration)
    window.scrollTo(0, run)
    if (timeElapsed < duration) requestAnimationFrame(animation)
  }
  
  function ease(t, b, c, d) {
    t /= d / 2
    if (t < 1) return c / 2 * t * t + b
    t--
    return -c / 2 * (t * (t - 2) - 1) + b
  }
  
  requestAnimationFrame(animation)
}

/**
 * Format date to readable string
 * @param {Date|string} date - Date to format
 * @param {Object} options - Intl.DateTimeFormat options
 * @returns {string} Formatted date
 */
export function formatDate(date, options = {}) {
  const defaultOptions = {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  }
  
  return new Intl.DateTimeFormat('en-US', { ...defaultOptions, ...options }).format(new Date(date))
}

/**
 * Generate random ID
 * @param {number} length - ID length
 * @returns {string} Random ID
 */
export function generateId(length = 8) {
  const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'
  let result = ''
  for (let i = 0; i < length; i++) {
    result += chars.charAt(Math.floor(Math.random() * chars.length))
  }
  return result
}

/**
 * Show notification
 * @param {string} message - Notification message
 * @param {string} type - Notification type (success, error, info, warning)
 * @param {number} duration - Display duration in milliseconds
 */
export function showNotification(message, type = 'info', duration = 3000) {
  const notification = document.createElement('div')
  notification.className = `notification notification-${type}`
  notification.setAttribute('role', 'alert')
  notification.setAttribute('aria-live', 'polite')
  notification.textContent = message
  
  // Add to DOM
  document.body.appendChild(notification)
  
  // Remove after duration
  setTimeout(() => {
    notification.style.animation = 'slideOut 0.3s ease'
    setTimeout(() => {
      if (notification.parentNode) {
        notification.parentNode.removeChild(notification)
      }
    }, 300)
  }, duration)
}

/**
 * Copy text to clipboard
 * @param {string} text - Text to copy
 * @returns {Promise<boolean>} Success status
 */
export async function copyToClipboard(text) {
  try {
    await navigator.clipboard.writeText(text)
    return true
  } catch (err) {
    // Fallback for older browsers
    const textArea = document.createElement('textarea')
    textArea.value = text
    document.body.appendChild(textArea)
    textArea.select()
    try {
      document.execCommand('copy')
      document.body.removeChild(textArea)
      return true
    } catch (err) {
      document.body.removeChild(textArea)
      return false
    }
  }
}

/**
 * Get query parameter value
 * @param {string} name - Parameter name
 * @param {string} url - URL to parse (defaults to current URL)
 * @returns {string|null} Parameter value
 */
export function getQueryParam(name, url = window.location.href) {
  const urlObj = new URL(url)
  return urlObj.searchParams.get(name)
}

/**
 * Set query parameter
 * @param {string} name - Parameter name
 * @param {string} value - Parameter value
 * @param {string} url - URL to modify (defaults to current URL)
 * @returns {string} Modified URL
 */
export function setQueryParam(name, value, url = window.location.href) {
  const urlObj = new URL(url)
  urlObj.searchParams.set(name, value)
  return urlObj.toString()
}

/**
 * Remove query parameter
 * @param {string} name - Parameter name
 * @param {string} url - URL to modify (defaults to current URL)
 * @returns {string} Modified URL
 */
export function removeQueryParam(name, url = window.location.href) {
  const urlObj = new URL(url)
  urlObj.searchParams.delete(name)
  return urlObj.toString()
}

/**
 * Check if device is mobile
 * @returns {boolean} Is mobile device
 */
export function isMobile() {
  return window.innerWidth < 768
}

/**
 * Check if device is tablet
 * @returns {boolean} Is tablet device
 */
export function isTablet() {
  return window.innerWidth >= 768 && window.innerWidth < 1024
}

/**
 * Check if device is desktop
 * @returns {boolean} Is desktop device
 */
export function isDesktop() {
  return window.innerWidth >= 1024
}
