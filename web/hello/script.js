var canvas = document.getElementById("game")
var ctx = canvas.getContext("2d")

var text = {
  x: 0,
  y: 24,
  dx: 2,
  dy: 2,
  font: "24px Arial",
  text: "Hello World!",
  update: function() {
    this.x += this.dx
    this.y += this.dy
    if (this.x == 470 || this.x == 0) {
      this.dx *= -1
    }
    if (this.y == 300 || this.y == 20) {
      this.dy *= -1
    }
  }
}

function draw() {
  ctx.fillStyle = "grey"
  ctx.fillRect(0, 0, 600, 300)

  ctx.fillStyle = "blue"
  ctx.font = text.font
  ctx.fillText(text.text, text.x, text.y)
}

function update() {
  text.update()
}

setInterval(function() {
  update()
  draw()
}, 60)
