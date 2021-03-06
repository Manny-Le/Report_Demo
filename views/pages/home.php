<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HMTL CV DEMO</title>
    <link href="assets/style.css" rel="stylesheet"/>
    <link href="assets/queries.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="centering">
    <header>

    <div class="nav-box">

      <h3>PERSONAL PROJECT</h3>

        <ul class="nav-list">
        <li><a 
        class="nav-link"
        href="index.php?controller=pages&action=home&id=1">HOME</a></li>

        <li><a
        class="nav-link"
        href="index.php?controller=persons&action=index">PERSONEL</a></li>

        <li><a
        class="nav-link"
        href="index.php?controller=projects&action=index">PROJECT</a></li>

        <li><a
        class="nav-link"
        href="index.php?controller=authentication&action=logout">LOG OUT</a></li>
      </ul>
    </div>
      <h1><?=$person->FullName;?> CV</h1>

      <h2><?=$person->JobApply?></h2>

      <img id="self-img"
        src="assets/CV-self.jpg" 
        alt="CV Headshot" 
        width="280" 
      />

      <div class="cv-info-block">       
      
          <div class="cv-info cvi-1">
            <img 
            class="cv-icon"
            src="<?php
            if ($person->Gender == "male") {
              echo "assets/male-icon.png";
            } else if ($person->Gender == "female") {
              echo "assets/female-icon.png";
            } else {
              echo "assets/heli-icon.png";
            }
            
            ?>" 
            alt="gender icon" 
            width="40" 
          />
          <p class="cv-text"><?= $person->Gender;?></p> 
          </div>
          <div class="cv-info">
            <img 
            class="cv-icon"
            src="assets/phone-icon.png" 
            alt="phone icon" 
            width="40"
            />
            <p class="cv-text"><?= $person->Phone;?></p>
          </div>
          
            <div class="cv-info">
              <img 
              class="cv-icon"
              src="assets/mail-icon.png" 
              alt="mail icon" 
              width="40"
              />
              <p class="cv-text"><?= $person->Mail;?></p>
            </div>

        <div class="cv-info">
          <img
            class="cv-icon"
            src="assets/calendar-icon.png"
            alt="calendar icon"
            width="40"
          />
          <p class="cv-text"><?= $person->DOB;?></p>
        </div>
          
        <div class="cv-info cv-add">
          <img
          class="cv-icon"
          src="assets/location-icon.png"
          alt="location icon"
          width="40"
          />
          <p class="cv-text"><?= $person->Addre;?></p>
        </div>
        
        <div class="cv-info cvi-6">
          <img
            class="fb-icon cv-icon"
            src="assets/facebook-icon.png"
            alt="facebook icon"
            width="40"
          />

          <a
            class="fb-link"
            href="#"
            target=""
            >
            <p class="cv-text"><?=$person->FullName;?></p>
            </a
          >
        </div>
  </div>
    </header>

    <div class="article-container">
    <article>
      <div class="intro-CV-block">
        <div class="intro-CV-el intro-1">
          <h3>INTRODUCTION</h3>
          <p class="text-block">
            I am a hard worker with basic programming knowledge. I am capable of
            self-learning, highly self-awareness and serious commitments for my
            goal. I could handle work in high pressure situation.
          </p>
        </div>

        <div class="intro-CV-el intro-2">
          <h3>CAREER GOAL</h3>
          <p class="text-block ">
            For starting, first goal is becoming a professional front-end developer.
            Then, a full-stack developer in the future.
          </p>
        </div>
        <div class="intro-CV-el intro-3">
            <div class="edu-block">
            <h3>EDUCATION</h3>

            <div class="cv-bot-edu">
              <img
                class="edu-assets"
                src="assets/rmit-university-logo.png"
                alt="rmit logo transparent"
                height="250"
              />
              <ul class="edu-li">
            
                <li>Information Technology Major</li>
                <li>Unfinished IT degree.</li>
                <li>Completed basic Java, C, C++ courses.</li>
              </ul>
            </div>
          </div>
        
        </div>
      </div>
      <div class="bot-container">
      <div class="left-float-container">
        <h3>WORK EXPERIENCE</h3>
        <ul class="job-li">
            
          <ul class="job-position">
            <li><h4 class="past-job">QOIL VIET NAM CO.,LTD (06/2021  -  03/2022)</h4>
            <li>Salesman</li>
            <li>Caring company's existing customers.</li>
            <li>Finding new customers.</li>
            <li>Following the customers' orders.</li>
            <li>Managing Google Console Platform for the company's website.</li>
          </ul>
        </li>

        <li>
          
          <ul class="job-position">
            <li><h4 class="past-job">IDOF JSC (2020-06/2021)</h4></li>
            <li>Retail Store Manager</li>
            <li>Managing Suni Green Farm retail store.</li>
            <li>Searching for new suppliers.</li>
            <li>Updating prices to latest market prices.</li>
            <li>Store human resources management.</li>
            <li>Forecasting sales and inventory management.</li>
            <li>Push purchase orders.
            </li>
          </ul>
        </li>

        <li>
          <ul class="job-position">
          <li><h4 class="past-job">Analog Caf??(2018-2020)</h4></li>
            <li>Manager</li>
            <li>Recruiting staff and arranging shift.</li>
            <li>Promoting and handling social network pages.</li>
            <li>Inventory management.</li>
          </ul>
        </li>

        <li>
          <ul class="job-position">
            <li><h4>Freelance Tour Guide (2015-2018)</h4></li>
            <li>Freelancer</li>
            <li>Exploring new locations for new tour.</li>
            <li>Planning, leading the tourists on bike to the location.</li>
            <li>Arranging meals and camp sites for tourists.</li>
          </ul>
        </li>
      </ul>
      </div>
      <div class="right-float-container">
        <div div class="skills-block">
          <h3>SKILLS</h3>
          <ul class="listing1">
            
              <li>Office skills</li>       
              <li>Average skills in Microsoft Word, Excel</li>
          </ul>              
          <ul class="listing1">
              <li>Soft skills</li>            
              <li>Speaking english fluently</li>
              <li>Work well both in a team or individually</li>              
          
          </ul>
        </div>

          <div class="hobbies-block">
            <h3>HOBBIES & INTERETESTS</h3>
            <ul>
              <li>Camping and backpacking</li>
              <li>Playing video games</li>
              <li>Reading comic books</li>
            </ul>
          </div>

          <div class="achievment">
            <h3>PERSONAL ACHIEVMENT</h3>
            <ul class="listing1">
              <li>Travelling & Backpacking</li>
              <li>Camping alone in the woods for 1 month.</li>
              <li>Travelling through Vietnam, Laos and Cambodia on motobike.</li>
            </ul>
          </div>

          <div class="displayProject">
            <h3>PERSONAL PROJECT</h3>
            <ul>
              <?php
              $countPro = 0;
              foreach ($project as $item) {?>
                <ul class="project-li">
                  <li>Project ID: <?=$item->proID;?></li>
                  <li>Project Name: <?=$item->proName;?></li>
                  <li>Project start time: <?=$item->proStart;?></li>
                  <li>Project end time: <?=$item->proEnd;?></li>

                </ul>
              <?php }?> 
          </div>
        </div>
      </div>
    </article>
  </div>
  </div>
  </body>
  <footer>
    <p>
      Copyright &copy; by Manny Le.
    </p>
  </footer>
  
</html>
