    <?php
        $title = $title ?? 'Philippines Angels';
    ?>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <title><?= esc($title) ?></title>

        <style>

            :root {
                /*main color */
                --midnight-black: #00040d;
                --base-Dark: #0E0E11;
                --light-dark: #3B3F45;

                /*accent color */
                --gold: #C9A24D;
                --gold2: #d8c292;

                /*text color */
                --soft-white: #F2F2F2;
                --weathered-blue: #4A6FA5;

            }

            /*main color */
            .color-midnight-black {
                background-color: var(--midnight-black);
            }

            .color-base-dark {
                background-color: var(--base-Dark);
            }

            .color-light-dark {
                background-color: var(--light-dark);
            }
            .color-soft-white {
                background-color: var(--soft-white);
            }
            .color-weathered-blue {
                background-color: var(--weathered-blue);
            }

            /*primary btn hover */
            .hover-primary:hover {
                background-color: var(--base-Dark);
                transition: background-color 0.5s ease, transform 0.5s ease;
                transform: scale(1.02);
            }

            /*accent color */
            .color-gold {
                background-color: var(--gold);
            }

            /*secondary btn hover */
            .hover-secondary:hover {
                background-color: var(--gold);
                transition: background-color 0.5s ease, transform 0.5s ease;
                cursor: pointer;
                transform: scale(1.02);
            }

            /*border btn*/
            .border-btn {
                border-color: var(--gold);
                border-width: 3px;
                color: var(--gold);
            }

            .border-btn-disable {
                border-color: #4a5565;
                border-width: 3px;
                color: #4a5565;
            }

            /*border btn hover */
            .hover-border:hover {
                background-color: var(--gold);
                transition: background-color 0.5s ease, transform 0.5s ease;
                transform: scale(1.02);
            }

            /*text color */
            .text-color-soft-white {
                color: var(--soft-white);
            }

            .text-color-weathered-blue {
                color: var(--weathered-blue);
            }

            .text-color-gold {
                color: var(--gold);
            }

            .nav-container {
                margin: 0 120px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .title {
                font-size: 2rem;
                color: var(--soft-white);
                display: block;
                text-align: center;
                margin-top: 10px;

            }

            .btn {
                font-size: 2rem;
                color: var(--soft-white);
                display: block;
                text-align: center;
                transition: all 0.3s ease;
            }

            .btn:hover {
                transform: scale(1.1);
                color: var(--gold);
            }

            .link:hover
            {
                transform: scale(1.1);
                color: var(--gold);
                cursor: pointer;
            }

            .link_2:hover
            {
                transform: scale(1.1);
                color: var(--weathered-blue);
                cursor: pointer;
            }

            .ourwork-carousel 
            {
                position: relative;
                width: 100%;
                margin: 0 auto;
                overflow: hidden;
            }

            .ourwork-carousel input 
            {
                display: none;
            }

            .ourwork-slides 
            {
                display: flex;
                width: 300%;
                transition: transform 0.5s ease;
            }

            .ourwork-slide 
            {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .ourwork-slide img 
            {
                width: 600px;
                height: 300px;
                box-shadow: 0 0 30px rgba(201, 162, 77, 0.6);
                object-fit: cover;
                display: block;
            }

            #ourwork-slide1:checked ~ .ourwork-slides 
            {
                transform: translateX(0%);
            }

            #ourwork-slide2:checked ~ .ourwork-slides 
            {
                transform: translateX(-33.3333%);
            }

            #ourwork-slide3:checked ~ .ourwork-slides 
            {
                transform: translateX(-66.6666%);
            }

            .ourwork-controls 
            {
                margin-top: 12px;
                display: flex;
                justify-content: center;
                gap: 10px;
            }

            .ourwork-controls label 
            {
                display: inline-block;
                width: 15px;
                height: 15px;
                background: white;
                border-radius: 50%;
                margin: 0 5px;
                cursor: pointer;

            }

            #ourwork-slide1:checked ~ .ourwork-controls label:nth-child(1),
            #ourwork-slide2:checked ~ .ourwork-controls label:nth-child(2),
            #ourwork-slide3:checked ~ .ourwork-controls label:nth-child(3) 
            {
                background: var(--gold);
                transform: scale(1.2);
            }
        </style>
    </head>