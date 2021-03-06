documentInfo = {
  getDocHeight : function() {
    var body = document.body
    var html = document.documentElement
    return Math.max(body.scrollHeight, body.offsetHeight,
                       html.clientHeight, html.scrollHeight, html.offsetHeight)
  },
  getDocWidth: function() {return document.body.clientWidth},
  clientX: null,
  clientY: null
}

/* Window class */
function Window(idOrClass) {
  this.self = document.getElementById(idOrClass)
  if (this.self == null) {
    this.self = document.getElementsByClassName(idOrClass)[0]
  }
  this.style = this.self.style
  this.classes = this.self.classList
  this.x = 50
  this.y = 50
  this.width = .5 * documentInfo.getDocWidth()
  this.height = documentInfo.getDocHeight() * .5
  this.addClass = function(className) {
    this.classes.add(className)
  }
  this.removeClass = function(className) {
    this.classes.remove(className)
  }
}

myWindow = new Window('window')
titleBar = myWindow.self.getElementsByClassName('title-bar')[0]
windowResize = document.getElementById('resize')
windowExit = document.getElementById('exit')


var icons = document.getElementsByClassName('icon')
for (var i = 0; i < icons.length; i++) {
  icons[i].onclick = function() {
    this.style.backgroundColor = "blue"
    if (this.classList.contains('clicked')) {
      this.style.backgroundColor = null
      myWindow.removeClass('invisible')
      myWindow.style.left = myWindow.x + 'px'
      myWindow.style.top = myWindow.y + 'px'
      myWindow.style.width = myWindow.width + 'px'
      myWindow.style.height = myWindow.height + 'px'
      this.classList.remove('clicked')
    } else {
      this.classList.add('clicked')
    }
  }
}

titleBar.onmousedown = function() {
  document.onmousemove = dragWindow
  function dragWindow(event) {
    event.preventDefault()
    if (documentInfo.clientX == null || documentInfo.clientY == null) {
      documentInfo.clientX = event.clientX
      documentInfo.clientY = event.clientY
    }
    var diffX = documentInfo.clientX - event.clientX
    var diffY = documentInfo.clientY - event.clientY
    documentInfo.clientX = event.clientX
    documentInfo.clientY = event.clientY
    myWindow.x -= diffX
    myWindow.y -= diffY
    myWindow.style.left = myWindow.x + "px"
    myWindow.style.top = myWindow.y + "px"
  }
}

windowResize.onmousedown = function() {
  if (event.target !== this) {
    return
  }
  document.onmousemove = resizeWindow
  function resizeWindow(event) {
    event.preventDefault()
    if (documentInfo.clientX == null || documentInfo.clientY == null) {
      documentInfo.clientX = event.clientX
      documentInfo.clientY = event.clientY
    }
    var diffX = documentInfo.clientX - event.clientX
    var diffY = documentInfo.clientY - event.clientY
    myWindow.width -= diffX
    myWindow.height -= diffY
    documentInfo.clientX = event.clientX
    documentInfo.clientY = event.clientY
    myWindow.style.width = myWindow.width + "px"
    myWindow.style.height = myWindow.height + "px"
  }
}

windowExit.onclick = function() {
  myWindow.addClass('invisible')
}

document.onmouseup = function() {
  document.onmousemove = null
  documentInfo.clientX = documentInfo.clientY = null
}

function onStartClick() {
  var startMenu = document.getElementsByClassName('start-menu')[0]
  if (!startMenu.classList.contains('full-size')) {
    startMenu.classList.add('full-size')
  } else {
    startMenu.classList.remove('full-size')
  }
}
