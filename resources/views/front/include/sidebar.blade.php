<ul class="desktop main-menu nav flex-column side-bar">
   
   @if ($mainPage == 'profile')
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'overview') ? 'active' : '' }}" href="{{ url('overview') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->overview['menu'], GetData::textBank()->overview['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'why') ? 'active' : '' }}" href="{{ url('why') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->why['menu'], GetData::textBank()->why['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item"> 
      <a class="nav-link {{ ($active == 'corporateStructure') ? '' : 'collapsed' }}" href="#corporatestructure" data-toggle="collapse" data-target="#corporatestructure" aria-expanded="true">
         <span>{{ getTextLang(GetData::textBank()->corporateStructure['menu'], GetData::textBank()->corporateStructure['menuInd']) }}</span>
      </a>
      <div class="collapse sub-item {{ ($active == 'corporateStructure') ? 'show' : '' }}" id="corporatestructure" aria-expanded="true">
         <ul class="flex-column nav">
            <li class="nav-item">
               <a class="nav-link py-0 {{ ($subActive == 'groupStructure') ? 'active' : '' }}" href="{{ url('group-structure') }}#container-main-content">
                  <span>{{ getTextLang(GetData::textBank()->groupStructure['menu'], GetData::textBank()->groupStructure['menuInd']) }}</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link py-0 {{ ($subActive == 'organizationChart') ? 'active' : '' }}" href="{{ url('organization-chart') }}#container-main-content">
                  <span>{{ getTextLang(GetData::textBank()->organizationChart['menu'], GetData::textBank()->organizationChart['menuInd']) }}</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link py-0 {{ ($subActive == 'management') ? 'active' : '' }}" href="{{ url('management') }}#container-main-content">
                  <span>{{ getTextLang(GetData::textBank()->management['menu'], GetData::textBank()->management['menuInd']) }}</span>
               </a>
            </li>
         </ul>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'milestone') ? 'active' : '' }}" href="{{ url('milestone') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->milestone['menu'], GetData::textBank()->milestone['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'humanCapital') ? 'active' : '' }}" href="{{ url('human-capital') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->humanCapital['menu'], GetData::textBank()->humanCapital['menuInd']) }}</span>
      </a>
   </li>
   @endif

   @if ($mainPage == 'financialServices')
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'brokerage') ? 'active' : '' }}" href="{{ url('brokerage') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->brokerage['menu'], GetData::textBank()->brokerage['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'underwriting') ? 'active' : '' }}" href="{{ url('underwriting') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->underwriting['menu'], GetData::textBank()->underwriting['menuInd']) }}</span>
      </a>
   </li>
   @endif

   @if ($mainPage == 'gcc')
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'ccc') ? 'active' : '' }}" href="{{ url('ccc') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->ccc['menu'], GetData::textBank()->ccc['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'coc') ? 'active' : '' }}" href="{{ url('coc') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->coc['menu'], GetData::textBank()->coc['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item"> 
      <a class="nav-link {{ ($active == 'sustainability') ? '' : 'collapsed' }}" href="#sustainability" data-toggle="collapse" data-target="#sustainability" aria-expanded="true">
         <span>{{ getTextLang(GetData::textBank()->sustainability['menu'], GetData::textBank()->sustainability['menuInd']) }}</span>
      </a>
      <div class="collapse sub-item {{ ($active == 'sustainability') ? 'show' : '' }}" id="sustainability" aria-expanded="true">
         <ul class="flex-column nav">
            <li class="nav-item">
               <a class="nav-link py-0 {{ ($subActive == 'sustainabilityReport') ? 'active' : '' }}" href="{{ url('sustainability-report') }}#container-main-content">
                  <span>{{ getTextLang(GetData::textBank()->sustainabilityReport['menu'], GetData::textBank()->sustainabilityReport['menuInd']) }}</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link py-0 {{ ($subActive == 'csrActivities') ? 'active' : '' }}" href="{{ url('csr-activities') }}#container-main-content">
                  <span>{{ getTextLang(GetData::textBank()->csrActivities['menu'], GetData::textBank()->csrActivities['menuInd']) }}</span>
               </a>
            </li>
         </ul>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'license') ? 'active' : '' }}" href="{{ url('license') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->license['menu'], GetData::textBank()->license['menuInd']) }}</span>
      </a>
   </li>
   @endif

   @if ($mainPage == 'investorRelations')
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'informationDisclosure') ? 'active' : '' }}" href="{{ url('information-disclosure') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->informationDisclosure['menu'], GetData::textBank()->informationDisclosure['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'annualReports') ? 'active' : '' }}" href="{{ url('annual-reports') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->annualReports['menu'], GetData::textBank()->annualReports['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'financialStatement') ? 'active' : '' }}" href="{{ url('financial-statement') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->financialStatement['menu'], GetData::textBank()->financialStatement['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'generalMeetingShareholders') ? 'active' : '' }}" href="{{ url('general-meeting-shareholders') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->generalMeetingShareholders['menu'], GetData::textBank()->generalMeetingShareholders['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'supportingInstitutions') ? 'active' : '' }}" href="{{ url('supporting-institutions') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->supportingInstitutions['menu'], GetData::textBank()->supportingInstitutions['menuInd']) }}</span>
      </a>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'stockInformation') ? 'active' : '' }}" href="{{ url('stock-information') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->stockInformation['menu'], GetData::textBank()->stockInformation['menuInd']) }}</span>
      </a>
   </li>
   @endif

   @if ($mainPage == 'researchAndNews')
   <li class="nav-item"> 
      <a class="nav-link {{ ($active == 'research') ? '' : 'collapsed' }}" href="#research" data-toggle="collapse" data-target="#research" aria-expanded="true">
         <span>{{ getTextLang(GetData::textBank()->research['menu'], GetData::textBank()->research['menuInd']) }}</span>
      </a>
      <div class="collapse sub-item {{ ($active == 'research') ? 'show' : '' }}" id="research" aria-expanded="true">
         <ul class="flex-column nav">
            <li class="nav-item">
               <a class="nav-link py-0 {{ ($subActive == 'dailyReports') ? 'active' : '' }}" href="{{ url('daily-reports') }}#container-main-content">
                  <span>{{ getTextLang(GetData::textBank()->dailyReports['menu'], GetData::textBank()->dailyReports['menuInd']) }}</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link py-0 {{ ($subActive == 'fullReports') ? 'active' : '' }}" href="{{ url('full-reports') }}#container-main-content">
                  <span>{{ getTextLang(GetData::textBank()->fullReports['menu'], GetData::textBank()->fullReports['menuInd']) }}</span>
               </a>
            </li>
         </ul>
      </div>
   </li>
   <li class="nav-item">
      <a class="nav-link collapsed {{ ($active == 'news') ? 'active' : '' }}" href="{{ url('news') }}#container-main-content">
         <span>{{ getTextLang(GetData::textBank()->news['menu'], GetData::textBank()->news['menuInd']) }}</span>
      </a>
   </li>
   @endif

</ul>

<div class="mobile">
   <select class="form-control" id="select-sidebar">   
      @if ($mainPage == 'profile')
         <option value="{{ url('overview') }}#container-main-content" {{ ($active == 'overview') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->overview['menu'], GetData::textBank()->overview['menuInd']) }}</option>
         <option value="{{ url('why') }}#container-main-content" {{ ($active == 'why') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->why['menu'], GetData::textBank()->why['menuInd']) }}</option>
         <!-- <optgroup label="{{ getTextLang(GetData::textBank()->corporateStructure['menu'], GetData::textBank()->corporateStructure['menuInd']) }}"> -->
            <option value="{{ url('group-structure') }}#container-main-content" {{ ($subActive == 'groupStructure') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->groupStructure['menu'], GetData::textBank()->groupStructure['menuInd']) }}</option>
            <option value="{{ url('organization-chart') }}#container-main-content" {{ ($subActive == 'organizationChart') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->organizationChart['menu'], GetData::textBank()->organizationChart['menuInd']) }}</option>
            <option value="{{ url('management') }}#container-main-content" {{ ($subActive == 'management') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->management['menu'], GetData::textBank()->management['menuInd']) }}</option>
         <!-- </optgroup> -->
         <option value="{{ url('milestone') }}#container-main-content" {{ ($active == 'milestone') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->milestone['menu'], GetData::textBank()->milestone['menuInd']) }}</option>
         <option value="{{ url('human-capital') }}#container-main-content" {{ ($active == 'humanCapital') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->humanCapital['menu'], GetData::textBank()->humanCapital['menuInd']) }}</option>
      @endif

      @if ($mainPage == 'financialServices')
         <option value="{{ url('brokerage') }}#container-main-content" {{ ($active == 'brokerage') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->brokerage['menu'], GetData::textBank()->brokerage['menuInd']) }}</option>
         <option value="{{ url('underwriting') }}#container-main-content" {{ ($active == 'underwriting') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->underwriting['menu'], GetData::textBank()->underwriting['menuInd']) }}</option>
      @endif

      @if ($mainPage == 'gcc')
         <option value="{{ url('ccc') }}#container-main-content" {{ ($active == 'ccc') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->ccc['menu'], GetData::textBank()->ccc['menuInd']) }}</option>
         <option value="{{ url('coc') }}#container-main-content" {{ ($active == 'coc') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->coc['menu'], GetData::textBank()->coc['menuInd']) }}</option>
         <!-- <optgroup label="{{ getTextLang(GetData::textBank()->sustainability['menu'], GetData::textBank()->sustainability['menuInd']) }}"> -->
            <option value="{{ url('sustainability-report') }}#container-main-content" {{ ($subActive == 'sustainabilityReport') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->sustainabilityReport['menu'], GetData::textBank()->sustainabilityReport['menuInd']) }}</option>
            <option value="{{ url('csr-activities') }}#container-main-content" {{ ($subActive == 'csrActivities') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->csrActivities['menu'], GetData::textBank()->csrActivities['menuInd']) }}</option>
         <!-- </optgroup> -->
         <option value="{{ url('license') }}#container-main-content" {{ ($active == 'license') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->license['menu'], GetData::textBank()->license['menuInd']) }}</option>
      @endif

      @if ($mainPage == 'investorRelations')
         <option value="{{ url('information-disclosure') }}#container-main-content" {{ ($active == 'informationDisclosure') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->informationDisclosure['menu'], GetData::textBank()->informationDisclosure['menuInd']) }}</option>
         <option value="{{ url('annual-reports') }}#container-main-content" {{ ($active == 'annualReports') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->annualReports['menu'], GetData::textBank()->annualReports['menuInd']) }}</option>
         <option value="{{ url('financial-statement') }}#container-main-content" {{ ($active == 'financialStatement') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->financialStatement['menu'], GetData::textBank()->financialStatement['menuInd']) }}</option>
         <option value="{{ url('general-meeting-shareholders') }}#container-main-content" {{ ($active == 'generalMeetingShareholders') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->generalMeetingShareholders['menu'], GetData::textBank()->generalMeetingShareholders['menuInd']) }}</option>
         <option value="{{ url('supporting-institutions') }}#container-main-content" {{ ($active == 'supportingInstitutions') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->supportingInstitutions['menu'], GetData::textBank()->supportingInstitutions['menuInd']) }}</option>
         <option value="{{ url('stock-information') }}#container-main-content" {{ ($active == 'stockInformation') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->stockInformation['menu'], GetData::textBank()->stockInformation['menuInd']) }}</option>
      @endif

      @if ($mainPage == 'researchAndNews')
         <!-- <optgroup label="{{ getTextLang(GetData::textBank()->research['menu'], GetData::textBank()->research['menuInd']) }}"> -->
            <option value="{{ url('daily-reports') }}#container-main-content" {{ ($subActive == 'dailyReports') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->dailyReports['menu'], GetData::textBank()->dailyReports['menuInd']) }}</option>
            <option value="{{ url('full-reports') }}#container-main-content" {{ ($subActive == 'fullReports') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->fullReports['menu'], GetData::textBank()->fullReports['menuInd']) }}</option>
         <!-- </optgroup> -->
         <option value="{{ url('news') }}#container-main-content" {{ ($active == 'news') ? 'selected' : '' }}>{{ getTextLang(GetData::textBank()->news['menu'], GetData::textBank()->news['menuInd']) }}</option>
      @endif

   </select>
</div>