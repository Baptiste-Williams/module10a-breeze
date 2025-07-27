const canvas = document.getElementById('matrixCanvas');
const ctx = canvas.getContext('2d');

canvas.height = window.innerHeight;
canvas.width = window.innerWidth;

const chars = 'アァイイウエエオカキクケコサシスセソABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$%&@';
const columns = canvas.width / 14;
const drops = Array(Math.floor(columns)).fill(1);

const draw = () => {
  ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
  ctx.fillRect(0, 0, canvas.width, canvas.height);
  ctx.fillStyle = '#0F0';
  ctx.font = '14px monospace';
  for (let i = 0; i < drops.length; i++) {
    const text = chars[Math.floor(Math.random() * chars.length)];
    ctx.fillText(text, i * 14, drops[i] * 14);
    drops[i] = drops[i] * 14 > canvas.height || Math.random() > 0.975 ? 0 : drops[i] + 1;
  }
};

setInterval(draw, 50);
