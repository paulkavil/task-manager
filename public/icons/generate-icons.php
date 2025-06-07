<?php
// This is a simple script to generate placeholder icons for your PWA
// You can replace these with your own custom icons later

// Check if GD library is available
if (!extension_loaded('gd')) {
    die("Error: PHP GD library is required to generate icons. Please install it or create icons manually.\n");
}

// Define icon sizes
$sizes = [72, 96, 128, 144, 152, 192, 384, 512];

// Create icons directory if it doesn't exist
$iconsDir = __DIR__;
if (!is_dir($iconsDir)) {
    mkdir($iconsDir, 0755, true);
}

// Create a simple colored square icon with text
foreach ($sizes as $size) {
    // Create image
    $im = imagecreatetruecolor($size, $size);
    
    // Fill with a gradient background - Laravel red to darker red
    $startColor = [239, 59, 45]; // Laravel red #EF3B2D
    $endColor = [200, 40, 30];   // Darker red
    
    // Create gradient effect
    for ($i = 0; $i < $size; $i++) {
        $ratio = $i / $size;
        $r = $startColor[0] - ($startColor[0] - $endColor[0]) * $ratio;
        $g = $startColor[1] - ($startColor[1] - $endColor[1]) * $ratio;
        $b = $startColor[2] - ($startColor[2] - $endColor[2]) * $ratio;
        
        $color = imagecolorallocate($im, $r, $g, $b);
        imagefilledrectangle($im, 0, $i, $size, $i, $color);
    }
    
    // Add text "PWA"
    $text_color = imagecolorallocate($im, 255, 255, 255);
    
    // Use simple text since we can't rely on TTF fonts being available
    $text = "PWA";
    $fontSize = min(5, max(1, intval($size / 32)));
    
    // Center the text as best as possible
    $textWidth = strlen($text) * imagefontwidth($fontSize);
    $textHeight = imagefontheight($fontSize);
    $x = ($size - $textWidth) / 2;
    $y = ($size - $textHeight) / 2;
    
    imagestring($im, $fontSize, $x, $y, $text, $text_color);
    
    // Save the image
    $filename = "icon-{$size}x{$size}.png";
    imagepng($im, $iconsDir . "/" . $filename);
    imagedestroy($im);
    
    echo "Created $filename\n";
}

echo "\nAll icons generated successfully!\n";
echo "\nNow you need to run this script to generate the actual icon files.\n";
echo "Visit: http://localhost/pwa%20test/laravel-pwa/public/icons/generate-icons.php\n";
?>
