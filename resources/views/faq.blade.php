<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.scss', 'resources/css/faq.scss', 'resources/js/app.js', 'resources/js/faq.js'])
    <script src="https://kit.fontawesome.com/f23681219e.js" crossorigin="anonymous"></script>
    <title>FAQ</title>
</head>
<body class="bg-warm-taupe dark">
<x-header/>
<section class="spacer">
    <div class="faq-container">

        @foreach($sections as $section)
            <div class="faq-theme">
                <!-- Section header -->
                <div class="theme-container" id="theme-{{ $section->id }}">
                    <div id="less-{{ $section->id }}"><i class="fa-solid fa-chevron-down fa-xl"></i></div>
                    <div id="more-{{ $section->id }}" class="hidden"><i class="fa-solid fa-chevron-right fa-xl"></i>
                    </div>
                    <span class="h1 ml-2">{{ $section->name }}</span>
                </div>
                <!-- Section FAQ list -->
                <div class="question-container" id="faq-{{ $section->id }}">
                    @foreach($section->faqs as $faq)
                        <div class="faq-question bg-dusty-cedar" id="question-{{ $faq->id }}">
                            <div class="faq-header">
                                <span class="faq-title">{{ $faq->question }}</span>
                                <span id="expand-{{ $faq->id }}">+</span>
                                <span id="retract-{{ $faq->id }}" class="hidden">-</span>
                            </div>
                            <div class="faq-text-blocks" id="answer-{{ $faq->id }}">
                                <div class="faq-text-block">
                                    <p class="faq-text">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
</section>
</body>
</html>
