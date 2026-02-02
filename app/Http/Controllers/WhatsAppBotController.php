<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppBotController extends Controller
{
    // Main Entry Point
    public function handle(Request $request)
    {
        // Accept 'message' from POST (or GET for testing)
        $incomingMessage = $request->input('message') ?? '';

        $text = $this->cleanText($incomingMessage);
        $reply = '';

        if ($text === '' || $this->isGreeting($text)) {
            $reply = $this->mainMenu();
        } else {
            $reply = $this->routeMenu($text);
        }

        // Return plain text for the automation tool to read
        return response($reply, 200)->header('Content-Type', 'text/plain');
    }

    // --- Logic Methods ---

    private function cleanText($text)
    {
        $text = strtolower(trim($text));
        $text = preg_replace('/\s+/', ' ', $text);
        return $text;
    }

    private function isGreeting($text)
    {
        $greetings = ['hi', 'hello', 'hey', 'hii', 'start', 'menu', 'help', '0', 'main menu'];
        foreach ($greetings as $g) {
            if ($text === $g || str_contains($text, $g))
                return true;
        }
        return false;
    }

    private function mainMenu()
    {
        return "Hello 👋 Welcome to *Stuvalley Technology Pvt. Ltd.*\n\n"
            . "How can we help you today? Reply with a number:\n\n"
            . "1️⃣ Website Development\n"
            . "2️⃣ Mobile App Development\n"
            . "3️⃣ Digital Marketing\n"
            . "4️⃣ Portfolio / Work Samples\n"
            . "5️⃣ Pricing / Packages\n"
            . "6️⃣ Free Consultation (Book)\n"
            . "7️⃣ Company Info\n"
            . "8️⃣ Talk to Human\n"
            . "0️⃣ Main Menu";
    }

    private function routeMenu($text)
    {
        // Simple switch case based on the 'clean' number
        // We look for the FIRST character if users type "1. Website" etc.
        $choice = substr($text, 0, 1);

        // Handle explicit numbers if cleanText kept more
        if (is_numeric($text)) {
            $choice = $text;
        }

        switch ($choice) {
            case '1':
                return "We build fast, secure, and modern websites ✅\n\n"
                    . "Choose one:\n"
                    . "1.1) Business Website\n"
                    . "1.2) E-commerce Website\n"
                    . "1.3) Portfolio Website\n"
                    . "1.4) Custom Web App (PHP/Laravel)\n"
                    . "1.5) Website Redesign\n"
                    . "9) Back\n"
                    . "0) Main Menu";

            case '2':
                return "We build Android/iOS apps with smooth UI & performance.\n\n"
                    . "Choose:\n"
                    . "2.1) Android App\n"
                    . "2.2) iOS App\n"
                    . "2.3) Flutter App (Android+iOS)\n"
                    . "2.4) App Redesign / Bug Fix\n"
                    . "9) Back\n"
                    . "0) Main Menu";

            case '3':
                return "Digital Marketing services 🚀\n\n"
                    . "Choose:\n"
                    . "3.1) SEO\n"
                    . "3.2) Google Ads\n"
                    . "3.3) Social Media Marketing\n"
                    . "3.4) Branding & Creatives\n"
                    . "9) Back\n"
                    . "0) Main Menu";

            case '4':
                return "Sure ✅ Please choose:\n"
                    . "4.1) Website Portfolio\n"
                    . "4.2) App Portfolio\n"
                    . "4.3) Marketing Results\n"
                    . "9) Back\n"
                    . "0) Main Menu";

            case '5':
                return "Pricing depends on features, pages, and timeline.\n\n"
                    . "Choose:\n"
                    . "5.1) Basic Website Package\n"
                    . "5.2) Standard Business Package\n"
                    . "5.3) Premium / Custom Package\n"
                    . "5.4) E-commerce Estimate\n"
                    . "9) Back\n"
                    . "0) Main Menu";

            case '6':
                return "Great! To book a FREE consultation, please reply with your details details:\n\n"
                    . "Name, Business, Service, Budget, Time\n\n"
                    . "Example:\n"
                    . "Name: Rahul\nBusiness: Clothing Shop\nService: E-commerce Website\nBudget: 30k–60k\nTime: Today 6 PM";

            case '7':
                return "*Stuvalley Technology Pvt. Ltd.*\n"
                    . "✅ IT Services | Web | App | Marketing\n"
                    . "📞 +91 7292 050505\n"
                    . "✉ hello@stuvalley.com\n\n"
                    . "Reply:\n7.1) Location / Office\n7.2) Working Hours\n0) Main Menu";

            case '8':
                return "Sure ✅ Please type your query in 1 message.\n"
                    . "Our team will respond as soon as possible.\n\n"
                    . "(For urgent call: +91 7292 050505)\n"
                    . "0) Main Menu";

            case '9':
                return $this->mainMenu();

            case '0':
                return $this->mainMenu();

            default:
                // Handle sub-menus (1.1, 1.2 etc) or fallback
                return $this->handleSubOptions($text);
        }
    }

    private function handleSubOptions($text)
    {
        // Basic sub-logic examples
        if (str_starts_with($text, '1.')) {
            return "✅ Great choice! For Web Development, please reply with your **Requirements** or type '6' to book a consultation.\n\n0) Main Menu";
        }

        // Lead Capture Detection (Basic)
        if (str_contains($text, 'name:') || str_contains($text, 'business:')) {
            return "Thank you ✅ Our team will contact you shortly.\n\n0) Main Menu";
        }

        return "Sorry, I didn’t understand that.\nReply:\n0) Main Menu\nor type: hi";
    }
}
