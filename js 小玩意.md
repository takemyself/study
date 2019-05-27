## js复制

```
const input = document.createElement('input')
document.body.appendChild(input)
input.setAttribute('readonly', 'readonly') //兼容ios的大坑
input.setAttribute('value', 'hello world')
input.select()
input.setSelectionRange(0, 9999) //兼容ios的大坑
if (document.execCommand('copy')) {
    document.execCommand('copy')
    console.log('复制成功')
}
document.body.removeChild(input)
```
## 冒泡事件阻止
```
document.querySelector('.class').addEventListener('click', function (e) {
      e = e || window.event
      if (e.stopPropagation) { // W3C阻止冒泡方法
        e.stopPropagation()
      } else {
        e.cancelBubble = true // IE阻止冒泡方法
      }
    })
```
## settimeout 第三个参数，可作为参数传进去
```
for (var index = 0;index < 5; index++) {
      setTimeout(function (i) {
        console.log(i)
      },0,index)
    }
```