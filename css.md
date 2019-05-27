### Display:inline-block 3像素问题
+ 父级加font-size:0 ,在子集重新加上font-size

### 显示省略号
overflow: hidden;
text-overflow:ellipsis;
white-space: nowrap;

### 强制不换行 
white-space:nowrap;


### 多行文本溢出显示省略号
height:50px;
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 3;
overflow: hidden;


### 自动转行、换行

word-wrap:break-word
word-break:normal  //英文字母断点换行

### pre标签 - 自动换行
white-space:pre-wrap
input那些破事ios 安卓
input[type="button"], input[type="submit"], input[type="reset"] {
    -webkit-appearance: none;
}
### 文字不可选中
-webkit-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
user-select:none;