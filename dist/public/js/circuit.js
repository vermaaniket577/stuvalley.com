/* 
   Circuit Board Animation Script 
   Draws a tech background with flowing currents
*/

document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('hero-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let width, height;
    
    // Configuration
    const bg = '#030b17'; // Deep Navy Background
    const lineBase = 'rgba(0, 255, 255, 0.05)'; // Faint grid lines
    const currentBase = '#00d4ff'; // Bright Cyan flow
    const nodeBase = 'rgba(0, 212, 255, 0.3)'; // Glowing nodes
    
    let lines = [];
    let currents = [];

    // Resize handler
    function resize() {
        width = canvas.width = window.innerWidth;
        height = canvas.height = window.innerHeight;
        initLines();
    }
    window.addEventListener('resize', resize);

    // Circuit Line Class
    class Line {
        constructor() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.length = Math.random() * 100 + 50;
            this.angle = (Math.floor(Math.random() * 4) * 90) * (Math.PI / 180); // 0, 90, 180, 270
            this.speed = Math.random() * 0.5 + 0.1;
        }

        draw() {
            const x2 = this.x + Math.cos(this.angle) * this.length;
            const y2 = this.y + Math.sin(this.angle) * this.length;
            
            ctx.beginPath();
            ctx.strokeStyle = lineBase;
            ctx.lineWidth = 1;
            ctx.moveTo(this.x, this.y);
            ctx.lineTo(x2, y2);
            ctx.stroke();

            // Draw Node at start
            ctx.beginPath();
            ctx.fillStyle = nodeBase;
            ctx.arc(this.x, this.y, 2, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    // Moving Current Class
    class Current {
        constructor(line) {
            this.line = line;
            this.progress = 0;
            this.speed = Math.random() * 0.02 + 0.005;
            this.size = Math.random() * 2 + 1;
        }

        update() {
            this.progress += this.speed;
            if (this.progress >= 1) {
                this.progress = 0;
                // Occasionally switch lines or reset
                this.line = lines[Math.floor(Math.random() * lines.length)];
            }
        }

        draw() {
            const x = this.line.x + Math.cos(this.line.angle) * (this.line.length * this.progress);
            const y = this.line.y + Math.sin(this.line.angle) * (this.line.length * this.progress);

            // Glow Effect
            ctx.shadowBlur = 10;
            ctx.shadowColor = currentBase;
            ctx.fillStyle = '#fff';
            
            ctx.beginPath();
            ctx.arc(x, y, this.size, 0, Math.PI * 2);
            ctx.fill();
            
            ctx.shadowBlur = 0; // Reset
        }
    }

    function initLines() {
        lines = [];
        currents = [];
        const count = Math.floor((width * height) / 15000); // Density
        
        for (let i = 0; i < count; i++) {
            lines.push(new Line());
        }
        
        // Add currents to some lines
        for (let i = 0; i < count/2; i++) {
            currents.push(new Current(lines[Math.floor(Math.random() * lines.length)]));
        }
    }

    function animate() {
        ctx.fillStyle = bg;
        ctx.fillRect(0, 0, width, height);

        // Draw Lines
        lines.forEach(line => line.draw());

        // Draw and Update Currents
        currents.forEach(current => {
            current.update();
            current.draw();
        });

        requestAnimationFrame(animate);
    }

    // Start
    resize();
    animate();
});
