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
                    @can('update', $section)
                        <form action="" class="h1 ml-2" method="post">
                            <input for="name" type="hidden">
                            <input for="Title" value="{{ $section->name }}">
                        </form>
                    @endcan
                    @cannot('update', $section)
                    <span class="h1 ml-2">{{ $section->name }}</span>
                    @endcannot
                </div>

                <!-- Section FAQ list -->
                <div class="question-container" id="faq-{{ $section->id }}">
                    @foreach($section->faqs as $faq)
                        <div class="faq-question bg-dusty-cedar" id="question-{{ $faq->id }}">
                            @can('update', $faq)
                                <form action="" class="faq-header">
                                    <input value="{{ $faq->question }}">
                                    <span id="expand-{{ $faq->id }}">+</span>
                                    <span id="retract-{{ $faq->id }}" class="hidden">-</span>
                                </form>

                                <div class="faq-text-blocks" id="answer-{{ $faq->id }}">
                                    <div class="faq-text-block">
                                        <form action="">
                                            <input value="{{$faq->answer}}">
                                        </form>
                                    </div>
                                </div>
                            @endcan

                            @cannot('update', $faq)
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
                            @endcannot
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    @can('create', $section)
        <form class="faq-create bg-dusty-cedar">
            <label for="section">Title:</label>
            <select name="">
            @foreach($sections as $section)
               <option>{{ $section->name }}</option>
            @endforeach
                <option>new</option>
            </select>
            <br>
            <input type="text" placeholder="New title">
            <hr>
            <div class="">
                <label for="question">Vraag:</label>
                <input type="text">
                <br>
                <label for="answer">Antwoord:</label>
                <input for="answer" />
            </div>

            <div class="flex justify-center" id="add-question">
                <span class="text-2xl font-bold">+</span>
            </div>
        </form>
    @endcan
</section>
</body>
</html>
