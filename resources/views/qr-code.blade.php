<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your QR Code | Wedding Invitation</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f9f6f2 0%, #f7e7ce 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            max-width: 600px;
            width: 100%;
        }

        .qr-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 3rem;
            text-align: center;
        }

        .header {
            margin-bottom: 2rem;
        }

        .header h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            color: #b76e79;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #666;
            font-size: 1.1rem;
        }

        .guest-info {
            background: linear-gradient(135deg, #f7e7ce 0%, #b76e79 100%);
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .guest-name {
            font-size: 1.8rem;
            font-weight: 600;
            color: white;
            margin-bottom: 0.5rem;
            font-family: 'Cormorant Garamond', serif;
        }

        .guest-code {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            letter-spacing: 2px;
        }

        .qr-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            display: inline-block;
        }

        .qr-code {
            width: 300px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-code svg {
            width: 100%;
            height: 100%;
        }

        .instructions {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            text-align: left;
        }

        .instructions h3 {
            color: #b76e79;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .instructions ul {
            list-style: none;
            padding: 0;
        }

        .instructions li {
            padding: 0.5rem 0;
            color: #555;
            display: flex;
            align-items: center;
        }

        .instructions li i {
            color: #b76e79;
            margin-right: 0.8rem;
            font-size: 1.1rem;
        }

        .actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #b76e79 0%, #9e5a64 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(183, 110, 121, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #b76e79;
            border: 2px solid #b76e79;
        }

        .btn-secondary:hover {
            background: #f9f6f2;
        }

        .info-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 2rem;
            text-align: left;
        }

        .info-box strong {
            color: #856404;
            display: block;
            margin-bottom: 0.5rem;
        }

        .info-box p {
            color: #856404;
            font-size: 0.95rem;
            margin: 0;
        }

        @media print {
            body {
                background: white;
            }

            .actions, .instructions, .info-box {
                display: none;
            }

            .qr-card {
                box-shadow: none;
            }
        }

        @media (max-width: 768px) {
            .qr-card {
                padding: 2rem 1.5rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .guest-name {
                font-size: 1.5rem;
            }

            .qr-code {
                width: 250px;
                height: 250px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="qr-card">
            <div class="header">
                <h1>💒 Your Invitation QR Code</h1>
                <p>Fabian & Naifa Wedding</p>
            </div>

            <div class="guest-info">
                <div class="guest-name">{{ $guest->name }}</div>
                <div class="guest-code">CODE: {{ $guest->code }}</div>
            </div>

            <div class="qr-container">
                <div class="qr-code">
                    {!! $qrCode !!}
                </div>
            </div>

            <div class="instructions">
                <h3><i class="fas fa-info-circle"></i> How to Use</h3>
                <ul>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>Present this QR code at the wedding venue entrance</span>
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>Our staff will scan your code for check-in</span>
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>You can save or print this page for easy access</span>
                    </li>
                    <li>
                        <i class="fas fa-check"></i>
                        <span>Your guest quota: {{ $guest->quota }} person(s)</span>
                    </li>
                </ul>
            </div>

            <div class="actions">
                <button onclick="downloadQR()" class="btn btn-primary">
                    <i class="fas fa-download"></i>
                    Download QR Code
                </button>
                <button onclick="window.print()" class="btn btn-secondary">
                    <i class="fas fa-print"></i>
                    Print
                </button>
                <a href="/invitation/{{ $guest->code }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Back to Invitation
                </a>
            </div>

            <div class="info-box">
                <strong><i class="fas fa-exclamation-triangle"></i> Important</strong>
                <p>Please keep this QR code secure and do not share it with others. Each code is unique to you.</p>
            </div>
        </div>
    </div>

    <script>
        function downloadQR() {
            // Get the SVG element
            const svgElement = document.querySelector('.qr-code svg');
            
            if (!svgElement) {
                alert('QR Code not found');
                return;
            }

            // Clone the SVG to avoid modifying the original
            const clonedSvg = svgElement.cloneNode(true);
            
            // Create a canvas
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            
            // Set canvas size (higher resolution for better quality)
            canvas.width = 800;
            canvas.height = 800;
            
            // Convert SVG to data URL
            const svgData = new XMLSerializer().serializeToString(clonedSvg);
            const svgBlob = new Blob([svgData], {type: 'image/svg+xml;charset=utf-8'});
            const url = URL.createObjectURL(svgBlob);
            
            // Create an image
            const img = new Image();
            img.onload = function() {
                // Draw white background
                ctx.fillStyle = 'white';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                
                // Draw the QR code
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                
                // Convert canvas to blob and download
                canvas.toBlob(function(blob) {
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'wedding-qr-code-{{ $guest->code }}.png';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                }, 'image/png');
                
                URL.revokeObjectURL(url);
            };
            
            img.onerror = function() {
                // Fallback: download as SVG if canvas conversion fails
                const svgData = new XMLSerializer().serializeToString(svgElement);
                const svgBlob = new Blob([svgData], {type: 'image/svg+xml;charset=utf-8'});
                const url = URL.createObjectURL(svgBlob);
                
                const a = document.createElement('a');
                a.href = url;
                a.download = 'wedding-qr-code-{{ $guest->code }}.svg';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            };
            
            img.src = url;
        }
    </script>
</body>
</html>