<div id="navbarSupportedContent">
   <ul class="main-menu nav flex-column">
      
      <li class="nav-item"> 
         <a class="nav-link collapsed" href="#profile" data-toggle="collapse" data-target="#profile" aria-expanded="true">
            <span>{{ getTextLang(GetData::textBank()->profile['menu'], GetData::textBank()->profile['menuInd']) }}</span>
         </a>
         <div class="collapse sub-item" id="profile" aria-expanded="true">
            <ul class="flex-column nav">
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('overview') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->overview['menu'], GetData::textBank()->overview['menuInd']) }}</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('why') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->why['menu'], GetData::textBank()->why['menuInd']) }}</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('group-structure') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->corporateStructure['menu'], GetData::textBank()->corporateStructure['menuInd']) }}</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('milestone') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->milestone['menu'], GetData::textBank()->milestone['menuInd']) }}</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('human-capital') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->humanCapital['menu'], GetData::textBank()->humanCapital['menuInd']) }}</span>
                  </a>
               </li>
            </ul>
         </div>
      </li>

      <li class="nav-item"> 
         <a class="nav-link collapsed" href="#financialServices" data-toggle="collapse" data-target="#financialServices" aria-expanded="true">
            <span>{{ getTextLang(GetData::textBank()->financialServices['menu'], GetData::textBank()->financialServices['menuInd']) }}</span>
         </a>
         <div class="collapse sub-item" id="financialServices" aria-expanded="true">
            <ul class="flex-column nav">
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('brokerage') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->brokerage['menu'], GetData::textBank()->brokerage['menuInd']) }}</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('underwriting') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->underwriting['menu'], GetData::textBank()->underwriting['menuInd']) }}</span>
                  </a>
               </li>
            </ul>
         </div>
      </li>

      <li class="nav-item"> 
         <a class="nav-link collapsed" href="#gcc" data-toggle="collapse" data-target="#gcc" aria-expanded="true">
            <span>{{ getTextLang(GetData::textBank()->gcc['menu'], GetData::textBank()->gcc['menuInd']) }}</span>
         </a>
         <div class="collapse sub-item" id="gcc" aria-expanded="true">
            <ul class="flex-column nav">
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('ccc') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->ccc['menu'], GetData::textBank()->ccc['menuInd']) }}</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('coc') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->coc['menu'], GetData::textBank()->coc['menuInd']) }}</span>
                  </a>
               </li>

               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('sustainability-report') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->sustainability['menu'], GetData::textBank()->sustainability['menuInd']) }}</span>
                  </a>
               </li>
               
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('license') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->license['menu'], GetData::textBank()->license['menuInd']) }}</span>
                  </a>
               </li>
               
            </ul>
         </div>
      </li>

      <li class="nav-item"> 
         <a class="nav-link collapsed" href="#investorRelations" data-toggle="collapse" data-target="#investorRelations" aria-expanded="true">
            <span>{{ getTextLang(GetData::textBank()->investorRelations['menu'], GetData::textBank()->investorRelations['menuInd']) }}</span>
         </a>
         <div class="collapse sub-item" id="investorRelations" aria-expanded="true">
            <ul class="flex-column nav">
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('information-disclosure') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->informationDisclosure['menu'], GetData::textBank()->informationDisclosure['menuInd']) }}</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('annual-reports') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->annualReports['menu'], GetData::textBank()->annualReports['menuInd']) }}</span>
                  </a>
               </li>

               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('financial-statement') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->financialStatement['menu'], GetData::textBank()->financialStatement['menuInd']) }}</span>
                  </a>
               </li>

               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('general-meeting-shareholders') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->generalMeetingShareholders['menu'], GetData::textBank()->generalMeetingShareholders['menuInd']) }}</span>
                  </a>
               </li>
               
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('supporting-institutions') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->supportingInstitutions['menu'], GetData::textBank()->supportingInstitutions['menuInd']) }}</span>
                  </a>
               </li>
               
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('stock-information') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->stockInformation['menu'], GetData::textBank()->stockInformation['menuInd']) }}</span>
                  </a>
               </li>
               
            </ul>
         </div>
      </li>

      <li class="nav-item"> 
         <a class="nav-link collapsed" href="#researchAndNews" data-toggle="collapse" data-target="#researchAndNews" aria-expanded="true">
            <span>{{ getTextLang(GetData::textBank()->researchAndNews['menu'], GetData::textBank()->researchAndNews['menuInd']) }}</span>
         </a>
         <div class="collapse sub-item" id="researchAndNews" aria-expanded="true">
            <ul class="flex-column nav">
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('daily-reports') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->research['menu'], GetData::textBank()->research['menuInd']) }}</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link py-0" href="{{ url('news') }}#container-main-content">
                     <span>{{ getTextLang(GetData::textBank()->news['menu'], GetData::textBank()->news['menuInd']) }}</span>
                  </a>
               </li>
            </ul>
         </div>
      </li>

      <li class="nav-item"> 
         <a class="nav-link collapsed" href="{{ url('faq') }}#container-main-content">
            <span>{{ getTextLang(GetData::textBank()->faq['menu'], GetData::textBank()->faq['menuInd']) }}</span>
         </a>
      </li>

      <li class="nav-item"> 
         <a class="nav-link collapsed" href="{{ url('contact') }}#container-main-content">
            <span>{{ getTextLang(GetData::textBank()->contact['menu'], GetData::textBank()->contact['menuInd']) }}</span>
         </a>
      </li>

   </ul>
</div>