<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f9f6f2; 
            padding: 20px; 
            margin: 0;
        }
        .container { 
            background-color: white; 
            padding: 40px; 
            border-radius: 12px; 
            max-width: 600px; 
            margin: 0 auto; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 { 
            color: #b76e79; 
            text-align: center; 
            font-size: 32px;
            margin-bottom: 20px;
        }
        .details { 
            background-color: #f7e7ce; 
            padding: 20px; 
            border-radius: 8px; 
            margin: 20px 0; 
        }
        .details h3 {
            color: #b76e79;
            margin-top: 0;
        }
        .details p {
            margin: 10px 0;
            color: #333;
        }
        .footer { 
            text-align: center; 
            color: #777; 
            margin-top: 30px; 
            font-size: 14px; 
            border-top: 1px solid #e8e8e8;
            padding-top: 20px;
        }
        .emoji {
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><span class="emoji">🎉</span> RSVP Confirmed! <span class="emoji">💒</span></h1>
        
        <p>Dear <strong>{{ $guest->name }}</strong>,</p>
        
        <p>Thank you for confirming your attendance at our wedding celebration!</p>
        
        <div class="details">
            <h3>📅 Wedding Details:</h3>
            <p><strong>Date:</strong> Monday, December 8th, 2025</p>
            <p><strong>Time:</strong> 7:30 - 9:00 AM</p>
            <p><strong>Location:</strong> SMK Telkom Purwokerto</p>
            <p><strong>Address:</strong> Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul</p>
            <p><strong>Your Guest Quota:</strong> {{ $guest->quota }} person(s)</p>
        </div>
        
        <p style="text-align: center; margin: 30px 0;">
            <strong style="color: #b76e79; font-size: 18px;">We will send you a reminder on the wedding day!</strong>
        </p>
        
        <p>We can't wait to celebrate with you!</p>
        
        <p style="margin-top: 30px;">
            With love,<br>
            <strong style="color: #b76e79; font-size: 20px;">Fabian & Naifa</strong>
        </p>
        
        <div class="footer">
            <p>This is an automated email. Please do not reply to this message.</p>
            <p>If you have any questions, please contact us directly.</p>
        </div>
    </div>
</body>
</html>