myWindow = document.getElementById('window')
titleBar = myWindow.getElementsByClassName('title-bar')[0]
windowResize = document.getElementById('resize')
windowExit = document.getElementById('exit')
myWindowX = 50
myWindowY = 50
windowWidth = .5 * document.body.clientWidth
body = document.body,
html = document.documentElement;
height = Math.max( body.scrollHeight, body.offsetHeight,
                   html.clientHeight, html.scrollHeight, html.offsetHeight );
windowHeight = .5 * height

var icons = document.getElementsByClassName('icon')
for (var i = 0; i < icons.length; i++) {
  icons[i].onclick = function() {
    this.style.backgroundColor = "blue"
    if (this.classList.contains('clicked')) {
      this.style.backgroundColor = null
      myWindow.classList.remove('invisible')
      myWindow.style.left = myWindowX + 'px'
      myWindow.style.top = myWindowY + 'px'
      myWindow.style.width = windowWidth + 'px'
      myWindow.style.height = windowHeight + 'px'
      this.classList.remove('clicked')
    } else {
      this.classList.add('clicked')
    }
  }
}

var clientX, clientY

titleBar.onmousedown = function() {
  document.onmousemove = dragWindow
  function dragWindow(event) {
    event.preventDefault()
    if (clientX == null || clientY == null) {
      clientX = event.clientX
      clientY = event.clientY
    }
    var diffX = clientX - event.clientX
    var diffY = clientY - event.clientY
    clientX = event.clientX
    clientY = event.clientY
    myWindowX -= diffX
    myWindowY -= diffY
    myWindow.style.left = myWindowX + "px"
    myWindow.style.top = myWindowY + "px"
  }
}

windowResize.onmousedown = function() {
  if (event.target !== this) {
    return
  }
  document.onmousemove = resizeWindow
  function resizeWindow(event) {
    event.preventDefault()
    if (clientX == null || clientY == null) {
      clientX = event.clientX
      clientY = event.clientY
    }
    var diffX = clientX - event.clientX
    var diffY = clientY - event.clientY
    console.log("diff{" + diffX + "," + diffY)
    windowWidth -= diffX
    windowHeight -= diffY
    clientX = event.clientX
    clientY = event.clientY
    myWindow.style.width = windowWidth + "px"
    myWindow.style.height = windowHeight + "px"
  }
}

windowExit.onclick = function() {
  myWindow.classList.add('invisible')
}

document.onmouseup = function() {
  document.onmousemove = null
  clientX = clientY = null
}

function onStartClick() {
  var startMenu = document.getElementsByClassName('start-menu')[0]
  if (startMenu.classList.contains('invisible')) {
    startMenu.classList.remove('invisible')
  } else {
    startMenu.classList.add('invisible')
  }
}
