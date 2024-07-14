<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!--=============== BOXICONS ===============-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<style>

        /*=============== GOOGLE FONTS ===============
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");*/
        
       
        :root {
          --header-height: 3rem;
        
         
          --hue: 174;
          --sat: 63%;
          --first-color: hsl(var(--hue), var(--sat), 40%);
          --first-color-alt: hsl(var(--hue), var(--sat), 36%);
          --title-color: hsl(var(--hue), 12%, 15%);
          --text-color: hsl(var(--hue), 8%, 35%);
          --body-color: hsl(var(--hue), 100%, 99%);
          --container-color: #FFF;
        
         
          --body-font: 'Open Sans', sans-serif;
          --h1-font-size: 1.5rem;
          --normal-font-size: .938rem;
          --tiny-font-size: .625rem;
        
         
          --z-tooltip: 10;
          --z-fixed: 100;
        }
        
        @media screen and (min-width: 968px) {
          :root {
            --h1-font-size: 2.25rem;
            --normal-font-size: 1rem;
          }
        }
        
      
        * {
          box-sizing: border-box;
          padding: 0;
          margin: 0;
        }
        
        html {
          scroll-behavior: smooth;
        }
        
        body {
          margin: var(--header-height) 0 0 0;
          font-family: var(--body-font);
          font-size: var(--normal-font-size);
          background-color: var(--body-color);
          color: var(--text-color);
        }
        
        ul {
          list-style: none;
        }
        
        a {
          text-decoration: none;
        }
        
        img {
          max-width: 100%;
          height: auto;
        }
        
      
        .section {
          padding: 4.5rem 0 2rem;
        }
        
        .section__title {
          font-size: var(--h1-font-size);
          color: var(--title-color);
          text-align: center;
          margin-bottom: 1.5rem;
        }
        
        .section__height {
          height: 100vh;
        }
        
       
        .container {
          max-width: 968px;
          margin-left: 1rem;
          margin-right: 1rem;
        }
        
     
        .header {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          background-color: var(--container-color);
          z-index: var(--z-fixed);
          transition: .4s;
        }
        
       
        .nav {
          height: var(--header-height);
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        
        .nav__img {
          width: 32px;
          border-radius: 50%;
        }
        
        .nav__logo {
          color: var(--title-color);
          font-weight: 600;
        }
        
        @media screen and (max-width: 767px) {
          .nav__menu {
            position: fixed;
            bottom: 0;
            left: 0;
            background-color: var(--container-color);
            box-shadow: 0 -1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
            width: 100%;
            height: 4rem;
            padding: 0 1rem;
            display: grid;
            align-content: center;
            border-radius: 1.25rem 1.25rem 0 0;
            transition: .4s;
          }
        }
        
        .nav__list, 
        .nav__link {
          display: flex;
        }
        
        .nav__link {
          flex-direction: column;
          align-items: center;
          row-gap: 4px;
          color: var(--title-color);
          font-weight: 600;
        }
        
        .nav__list {
          justify-content: space-around;
        }
        
        .nav__name {
          font-size: var(--tiny-font-size);
          /* display: none;/ / Minimalist design, hidden labels */
        }
        
        .nav__icon {
          font-size: 2rem;
          color:#004aad;
        }
        
        
        .active-link {
          position: relative;
          color: #004aad;
          transition: .3s;
        }
        
        /* Minimalist design, active link */
        /* .active-link::before{
          content: '';
          position: absolute;
          bottom: -.5rem;
          width: 4px;
          height: 4px;
          background-color: var(--first-color);
          border-radius: 50%;
        } */
        
        /* Change background header */
        .scroll-header {
          box-shadow: 0 1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
        }
        
       
        /* For small devices */
        /* Remove if you choose, the minimalist design */
        @media screen and (max-width: 320px) {
          .nav__name {
            display: none;
          }
        }
        
        /* For medium devices */
        @media screen and (min-width: 576px) {
          .nav__list {
            justify-content: center;
            column-gap: 3rem;
          }
        }
        
        @media screen and (min-width: 767px) {
          body {
            margin: 0;
          }
          .section {
            padding: 7rem 0 2rem;
          }
          .nav {
            height: calc(var(--header-height) + 1.5rem); /* 4.5rem */
          }
          .nav__img {
            display: none;
          }
          .nav__icon {
            display: none;
          }
          .nav__name {
            font-size: var(--normal-font-size);
            /* display: block; / / Minimalist design, visible labels */
          }
          .nav__link:hover {
            color: var(--first-color);
            color:#004aad;
          }
        
          /* First design, remove if you choose the minimalist design */
          .active-link::before {
            content: '';
            position: absolute;
            bottom: -.75rem;
            width: 4px;
            height: 4px;
            background-color: var(--first-color
            );
            border-radius: 50%;
          }
        
          /* Minimalist design */
          /* .active-link::before{
              bottom: -.75rem;
          } */
        }
        
        /* For large devices */
        @media screen and (min-width: 1024px) {
          .container {
            margin-left: auto;
            margin-right: auto;
          }
        }
        .active-link .nav__icon {
  color: #004aad;
}
    </style>
    <body>
        <title>Responsive bottom navigation</title>

        <!--=============== HEADER ===============-->
        
              

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.php" class="nav__link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="useraccounts.php" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Accounts</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="search.php" class="nav__link">
                                <i class='bx bx-search-alt nav__icon'></i>
                                <span class="nav__name">Search</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="index1.php" class="nav__link">
                                <i class=''>
                               
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 21q-3.45 0-6.012-2.287T3.05 13H5.1q.35 2.6 2.313 4.3T12 19q2.925 0 4.963-2.037T19 12q0-2.925-2.037-4.962T12 5q-1.725 0-3.225.8T6.25 8H9v2H3V4h2v2.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924q1.212 1.213 1.925 2.85T21 12q0 1.875-.712 3.513t-1.925 2.85q-1.213 1.212-2.85 1.925T12 21m2.8-4.8L11 12.4V7h2v4.6l3.2 3.2z"></path></svg></i>
                                <span class="nav__name">History</span>
                            </a>
                        </li>

                       
                    </ul>
                </div>

                <img src="assets/img/perfil.png" alt="" class="nav__img">
        
        </header>
        

        <main>
            <!--=============== HOME ===============-->
            
           
        </main>
        
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js">
        <!--=============== MAIN JS ===============-->
        
          
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight,
            sectionTop = current.offsetTop - 50,
            sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('')
        }
    })
}
window.addEventListener('scroll', scrollActive)


function scrollHeader(){
    const header = document.getElementById('header')
    // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 80) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)
        </script>
        </body>
        </html>