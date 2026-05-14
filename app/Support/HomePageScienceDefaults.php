<?php

namespace App\Support;

/**
 * Default copy & asset URLs for the home “Science That Defines Aesthetics” block when DB fields are empty.
 */
final class HomePageScienceDefaults
{
    public const MAIN_IMAGE =
        'https://dermalife.ae/wp-content/uploads/2025/09/SECTION_TECH-01-scaled.webp';

    /** @return list<array{icon_image: string, title: string, body: string}> */
    public static function features(): array
    {
        return [
            [
                'icon_image' => '',
                'title' => 'Evidence-Based Formulations',
                'body' => 'Every solution we deliver is built on rigorous medical research and supported by clinical validation.',
            ],
            [
                'icon_image' => '',
                'title' => 'European Standards',
                'body' => 'Our portfolio follows strict European quality and safety protocols to ensure consistent, reliable outcomes.',
            ],
            [
                'icon_image' => '',
                'title' => 'Intelligent Formulation Engineering',
                'body' => 'We engineer skincare systems built for real clinical performance, focusing on efficacy, stability, and simplicity—not ingredient complexity.',
            ],
            [
                'icon_image' => '',
                'title' => 'Professional & Home Care',
                'body' => 'Our portfolio includes advanced solutions for dermatologists and clinics, as well as specialized home care products to support ongoing patient treatment.',
            ],
            [
                'icon_image' => '',
                'title' => 'Comprehensive Care',
                'body' => 'From Home care to topical kits, our portfolio supports every stage of patient care, including pre-treatment, in-clinic procedures, and post-care maintenance.',
            ],
            [
                'icon_image' => '',
                'title' => 'Lasting Results',
                'body' => 'We prioritize treatments that are predictable, safe, and clinically validated, ensuring visible improvements and long-term satisfaction for both doctors and patients.',
            ],
        ];
    }

    public static function body(): string
    {
        return 'At Derma Life Cosmetics, based in Dubai, we focus on bringing advanced scientific solutions to dermatology and aesthetic medicine across the UAE. Our portfolio includes internationally recognized brands, known for their clinically validated mesotherapy and professional skincare formulations. By combining medical research with strict European standards, we provide doctors and clinics with trusted treatments that deliver predictable, safe, and lasting results.';
    }
}
