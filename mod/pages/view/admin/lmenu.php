
<body>
    <div class="crm">
        <div class="menu_crm">
            <div class="menu_crm_header">
                <img src="/src/admin/img/logogakman.svg" alt="">
                
            </div>


            <div class="menu_crm_element_box">
                <?php
                /*
                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">

                        <img class="menu_crm_item_icon" src="/src/admin/img/seo.svg" alt="">
                        <p class="menu_crm_item_name">Ceo</p>
                    </a>
                </div>*/

                ?>
                <div class="menu_crm_item"> 
                        <a class="menu_crm_item_link <?php if($h["url"]["d_array"][2] == "shop"){echo "crm_link_active";}?> "  >
                    
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.13232 7.94751V11.1279C2.13232 14.3083 3.40732 15.5833 6.58774 15.5833H10.4057C13.5861 15.5833 14.8611 14.3083 14.8611 11.1279V7.94751" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.50018 8.50008C9.79643 8.50008 10.7527 7.44467 10.6252 6.14842L10.1577 1.41675H6.84976L6.37518 6.14842C6.24768 7.44467 7.20393 8.50008 8.50018 8.50008Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.9698 8.50008C14.4006 8.50008 15.449 7.33842 15.3073 5.91467L15.109 3.96675C14.854 2.12508 14.1456 1.41675 12.2898 1.41675H10.1294L10.6252 6.38217C10.7456 7.55092 11.8011 8.50008 12.9698 8.50008Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.99486 8.50008C5.16361 8.50008 6.21902 7.55092 6.33236 6.38217L6.48819 4.81675L6.82819 1.41675H4.66777C2.81194 1.41675 2.10361 2.12508 1.84861 3.96675L1.65736 5.91467C1.51569 7.33842 2.56402 8.50008 3.99486 8.50008Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.49984 12.0417C7.31692 12.0417 6.729 12.6297 6.729 13.8126V15.5834H10.2707V13.8126C10.2707 12.6297 9.68275 12.0417 8.49984 12.0417Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                            <p class="menu_crm_item_name">Магазин</p>
                        </a>

                    <div id="myDropdown" class="menu_crm_podmenu">
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "kategor"){echo " crm_link_active_podmenu";}?> " href="/admin/shop/kategor/"> 
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.0957 9.5625H2.904C1.8415 9.5625 1.4165 10.0158 1.4165 11.1421V14.0038C1.4165 15.13 1.8415 15.5833 2.904 15.5833H14.0957C15.1582 15.5833 15.5832 15.13 15.5832 14.0038V11.1421C15.5832 10.0158 15.1582 9.5625 14.0957 9.5625Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.0957 1.41675H2.904C1.8415 1.41675 1.4165 1.87008 1.4165 2.99633V5.858C1.4165 6.98425 1.8415 7.43758 2.904 7.43758H14.0957C15.1582 7.43758 15.5832 6.98425 15.5832 5.858V2.99633C15.5832 1.87008 15.1582 1.41675 14.0957 1.41675Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                                <p class="menu_crm_item_name">Категории</p>
                            </a>
                        </div>
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link  <?php if($h["url"]["d_array"][3] == "product"){echo " crm_link_active_podmenu";}?>" href="/admin/shop/product/">

                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.021 10.0938C6.021 11.4538 7.14016 12.5729 8.50016 12.5729C9.86016 12.5729 10.9793 11.4538 10.9793 10.0938" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.24044 1.41675L3.67627 3.988" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.7598 1.41675L13.3239 3.988" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.4165 5.56047C1.4165 4.25005 2.11775 4.1438 2.989 4.1438H14.0107C14.8819 4.1438 15.5832 4.25005 15.5832 5.56047C15.5832 7.08338 14.8819 6.97713 14.0107 6.97713H2.989C2.11775 6.97713 1.4165 7.08338 1.4165 5.56047Z" stroke="#444444" stroke-width="1.5"/>
                            <path d="M2.479 7.08325L3.47775 13.2033C3.70442 14.5774 4.24984 15.5833 6.27567 15.5833H10.5469C12.7498 15.5833 13.0757 14.6199 13.3307 13.2883L14.5207 7.08325" stroke="#444444" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>

                                
                                <p class="menu_crm_item_name">Товары</p>
                            </a>
                        </div>
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link  <?php if($h["url"]["d_array"][3] == "textur"){echo " crm_link_active_podmenu";}?>" href="/admin/shop/textur/">

                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.021 10.0938C6.021 11.4538 7.14016 12.5729 8.50016 12.5729C9.86016 12.5729 10.9793 11.4538 10.9793 10.0938" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.24044 1.41675L3.67627 3.988" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.7598 1.41675L13.3239 3.988" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.4165 5.56047C1.4165 4.25005 2.11775 4.1438 2.989 4.1438H14.0107C14.8819 4.1438 15.5832 4.25005 15.5832 5.56047C15.5832 7.08338 14.8819 6.97713 14.0107 6.97713H2.989C2.11775 6.97713 1.4165 7.08338 1.4165 5.56047Z" stroke="#444444" stroke-width="1.5"/>
                            <path d="M2.479 7.08325L3.47775 13.2033C3.70442 14.5774 4.24984 15.5833 6.27567 15.5833H10.5469C12.7498 15.5833 13.0757 14.6199 13.3307 13.2883L14.5207 7.08325" stroke="#444444" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>

                                
                                <p class="menu_crm_item_name">Текстуры ткани</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="menu_crm_item">
                    <a class="menu_crm_item_link <?php if($h["url"]["d_array"][2] == "crm"){echo "crm_link_active";}?> "  >
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.41406 6.02075H8.14323" stroke="#2F6BF2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4.24707 11.6875H5.66374" stroke="#2F6BF2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.43457 11.6875H10.2679" stroke="#2F6BF2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15.5807 8.52133V11.4113C15.5807 13.8976 14.9503 14.5209 12.4357 14.5209H4.55906C2.04448 14.5209 1.41406 13.8976 1.41406 11.4113V5.58883C1.41406 3.10258 2.04448 2.47925 4.55906 2.47925H10.2682" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.5124 2.92543L10.8845 5.55335C10.7853 5.65251 10.6862 5.85085 10.6649 5.99251L10.5233 6.99835C10.4737 7.3596 10.7287 7.6146 11.0899 7.56501L12.0958 7.42335C12.2374 7.4021 12.4358 7.30293 12.5349 7.20376L15.1628 4.57585C15.6162 4.12251 15.8287 3.59835 15.1628 2.93251C14.4899 2.2596 13.9658 2.4721 13.5124 2.92543Z" stroke="#2F6BF2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.1367 3.30078C13.3634 4.1012 13.9867 4.72453 14.7801 4.94411" stroke="#2F6BF2" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                        <p class="menu_crm_item_name">CRM</p>
                    </a>
                    <div id="myDropdown" class="menu_crm_podmenu">
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "zayavki"){echo " crm_link_active_podmenu";}?> " href="/admin/crm/zayavki/"> 
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.3332 1.41675H5.6665C2.83317 1.41675 1.4165 2.83341 1.4165 5.66675V14.8751C1.4165 15.2647 1.73525 15.5834 2.12484 15.5834H11.3332C14.1665 15.5834 15.5832 14.1667 15.5832 11.3334V5.66675C15.5832 2.83341 14.1665 1.41675 11.3332 1.41675Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.021 8.5H10.9793" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.5 10.9791V6.02075" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                                <p class="menu_crm_item_name">Заявки</p>
                            </a>
                        </div>
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "bays"){echo " crm_link_active_podmenu";}?> " href="/admin/crm/bays/"> 
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" >
                            <path d="M5.3125 5.43298V4.7459C5.3125 3.15215 6.59458 1.58673 8.18833 1.43798C10.0867 1.25382 11.6875 2.7484 11.6875 4.61132V5.58882" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.37476 15.5834H10.6248C13.4723 15.5834 13.9823 14.443 14.131 13.0547L14.6623 8.80467C14.8535 7.07633 14.3577 5.66675 11.3331 5.66675H5.66642C2.64184 5.66675 2.14601 7.07633 2.33726 8.80467L2.86851 13.0547C3.01726 14.443 3.52726 15.5834 6.37476 15.5834Z" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.9758 8.49992H10.9821" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.01678 8.49992H6.02314" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>


                                <p class="menu_crm_item_name">Покупки</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
                
                <div class="menu_crm_item">
                    <a class="menu_crm_item_link <?php if($h["url"]["d_array"][2] == "constructor"){echo "crm_link_active";}?> "  >
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.2078 13.4584V3.54175C15.2078 2.12508 14.4995 1.41675 13.0828 1.41675H10.2495C8.83285 1.41675 8.12451 2.12508 8.12451 3.54175V13.4584C8.12451 14.8751 8.83285 15.5834 10.2495 15.5834H13.0828C14.4995 15.5834 15.2078 14.8751 15.2078 13.4584Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M8.12451 4.25H11.6662" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M8.12451 12.75H10.9578" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M8.12451 9.8811L11.6662 9.91652" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M8.12451 7.08325H10.2495" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M3.88866 1.41675C2.73408 1.41675 1.79199 2.35883 1.79199 3.50633V12.6863C1.79199 13.0051 1.92658 13.4867 2.08949 13.763L2.67033 14.7263C3.33616 15.8384 4.43408 15.8384 5.09991 14.7263L5.68074 13.763C5.84366 13.4867 5.97824 13.0051 5.97824 12.6863V3.50633C5.97824 2.35883 5.03616 1.41675 3.88866 1.41675Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M5.97824 4.95825H1.79199" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                        <p class="menu_crm_item_name">Конструктор</p>
                    </a>
                    <div id="myDropdown" class="menu_crm_podmenu">
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "pages"){echo " crm_link_active_podmenu";}?> " href="/admin/constructor/pages/"> 
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.37484 15.5834H10.6248C14.1665 15.5834 15.5832 14.1667 15.5832 10.6251V6.37508C15.5832 2.83341 14.1665 1.41675 10.6248 1.41675H6.37484C2.83317 1.41675 1.4165 2.83341 1.4165 6.37508V10.6251C1.4165 14.1667 2.83317 15.5834 6.37484 15.5834Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 1.41675V15.5834" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 6.02075H15.5835" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.0835 10.9792H15.5835" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>


                                <p class="menu_crm_item_name">Страницы</p>
                            </a>
                        </div>
                        
                    </div>
                </div>
 <?php
 /*               
 
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link  <?php if($h["url"]["d_array"][3] == "block"){echo " crm_link_active_podmenu";}?>" href="/admin/constructor/block/">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.4165 6.37508V4.60425C1.4165 2.8405 2.84025 1.41675 4.604 1.41675H6.37484" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.625 1.41675H12.3958C14.1596 1.41675 15.5833 2.8405 15.5833 4.60425V6.37508" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5835 11.3333V12.3958C15.5835 14.1595 14.1597 15.5833 12.396 15.5833H11.3335" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.37484 15.5833H4.604C2.84025 15.5833 1.4165 14.1596 1.4165 12.3958V10.625" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                                
                                <p class="menu_crm_item_name">Блоки</p>
                            </a>
                        </div>
                        
                <div class="menu_crm_item">
                    <a class="menu_crm_item_link <?php if($h["url"]["d_array"][2] == "tools"){echo "crm_link_active";}?> "  >
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.47902 14.5209C3.06694 15.1088 4.01611 15.1088 4.60402 14.5209L13.8124 5.31252C14.4003 4.7246 14.4003 3.77544 13.8124 3.18752C13.2244 2.5996 12.2753 2.5996 11.6874 3.18752L2.47902 12.3959C1.89111 12.9838 1.89111 13.9329 2.47902 14.5209Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.7573 6.36792L10.6323 4.24292" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.021 1.72841L7.0835 1.41675L6.77183 2.47925L7.0835 3.54175L6.021 3.23008L4.9585 3.54175L5.27016 2.47925L4.9585 1.41675L6.021 1.72841Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3.1875 5.97841L4.25 5.66675L3.93833 6.72925L4.25 7.79175L3.1875 7.48008L2.125 7.79175L2.43667 6.72925L2.125 5.66675L3.1875 5.97841Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.8125 9.51992L14.875 9.20825L14.5633 10.2708L14.875 11.3333L13.8125 11.0216L12.75 11.3333L13.0617 10.2708L12.75 9.20825L13.8125 9.51992Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                        <p class="menu_crm_item_name">Инструменты</p>
                    </a>
                    <div id="myDropdown" class="menu_crm_podmenu">
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "webp"){echo " crm_link_active_podmenu";}?> " href="/admin/tools/webp/"> 
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.3413 8.91095V10.8447C10.3413 12.4597 9.69676 13.1043 8.08176 13.1043H6.15509C4.54717 13.1043 3.89551 12.4597 3.89551 10.8447V8.91095C3.89551 7.30303 4.54009 6.65845 6.15509 6.65845H8.08884C9.69676 6.65845 10.3413 7.30303 10.3413 8.91095Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.104 6.1485V8.08225C13.104 9.69725 12.4595 10.3418 10.8445 10.3418H10.3415V8.911C10.3415 7.30308 9.69695 6.6585 8.08195 6.6585H6.6582V6.1485C6.6582 4.5335 7.30279 3.896 8.91779 3.896H10.8515C12.4595 3.896 13.104 4.54058 13.104 6.1485Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5833 10.625C15.5833 13.3662 13.3662 15.5833 10.625 15.5833L11.3687 14.3437" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.4165 6.37508C1.4165 3.63383 3.63359 1.41675 6.37484 1.41675L5.63109 2.65633" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                                <p class="menu_crm_item_name">Вебп конвектор</p>
                            </a>
                        </div> 
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "compressor"){echo " crm_link_active_podmenu";}?> " href="/admin/tools/compressor/"> 
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.3413 8.91095V10.8447C10.3413 12.4597 9.69676 13.1043 8.08176 13.1043H6.15509C4.54717 13.1043 3.89551 12.4597 3.89551 10.8447V8.91095C3.89551 7.30303 4.54009 6.65845 6.15509 6.65845H8.08884C9.69676 6.65845 10.3413 7.30303 10.3413 8.91095Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.104 6.1485V8.08225C13.104 9.69725 12.4595 10.3418 10.8445 10.3418H10.3415V8.911C10.3415 7.30308 9.69695 6.6585 8.08195 6.6585H6.6582V6.1485C6.6582 4.5335 7.30279 3.896 8.91779 3.896H10.8515C12.4595 3.896 13.104 4.54058 13.104 6.1485Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.5833 10.625C15.5833 13.3662 13.3662 15.5833 10.625 15.5833L11.3687 14.3437" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.4165 6.37508C1.4165 3.63383 3.63359 1.41675 6.37484 1.41675L5.63109 2.65633" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                                <p class="menu_crm_item_name">Компресор БД</p>
                            </a>

                        </div>                        
                    </div>
                </div>

*/?>
                
                <div class="menu_crm_item">
                    <a class="menu_crm_item_link <?php if($h["url"]["d_array"][2] == "moduls"){echo "crm_link_active";}?> "  >
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5833 5.858V2.99633C15.5833 1.87008 15.13 1.41675 14.0038 1.41675H11.1421C10.0158 1.41675 9.5625 1.87008 9.5625 2.99633V5.858C9.5625 6.98425 10.0158 7.43758 11.1421 7.43758H14.0038C15.13 7.43758 15.5833 6.98425 15.5833 5.858Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.43734 6.03508V2.81925C7.43734 1.8205 6.984 1.41675 5.85775 1.41675H2.99609C1.86984 1.41675 1.4165 1.8205 1.4165 2.81925V6.028C1.4165 7.03383 1.86984 7.4305 2.99609 7.4305H5.85775C6.984 7.43758 7.43734 7.03383 7.43734 6.03508Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.43734 14.0038V11.1421C7.43734 10.0158 6.984 9.5625 5.85775 9.5625H2.99609C1.86984 9.5625 1.4165 10.0158 1.4165 11.1421V14.0038C1.4165 15.13 1.86984 15.5833 2.99609 15.5833H5.85775C6.984 15.5833 7.43734 15.13 7.43734 14.0038Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.271 12.3958H14.521" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M12.396 14.5208V10.2708" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                        <p class="menu_crm_item_name">Модули</p>
                    </a>
                    <div id="myDropdown" class="menu_crm_podmenu">
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "project"){echo " crm_link_active_podmenu";}?> " href="/admin/moduls/project/"> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.02067 13.4584H5.6665C2.83317 13.4584 1.4165 12.7501 1.4165 9.20841V5.66675C1.4165 2.83341 2.83317 1.41675 5.6665 1.41675H11.3332C14.1665 1.41675 15.5832 2.83341 15.5832 5.66675V9.20841C15.5832 12.0417 14.1665 13.4584 11.3332 13.4584H10.979C10.7594 13.4584 10.5469 13.5647 10.4123 13.7417L9.34984 15.1584C8.88234 15.7817 8.11734 15.7817 7.64984 15.1584L6.58734 13.7417C6.474 13.5859 6.21192 13.4584 6.02067 13.4584Z" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.9585 5.66675H12.0418" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.9585 9.20825H9.2085" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <p class="menu_crm_item_name">Проекты</p>
                            </a>
                        </div>  

                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "otzivi"){echo " crm_link_active_podmenu";}?> " href="/admin/moduls/otzivi/"> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.02067 13.4584H5.6665C2.83317 13.4584 1.4165 12.7501 1.4165 9.20841V5.66675C1.4165 2.83341 2.83317 1.41675 5.6665 1.41675H11.3332C14.1665 1.41675 15.5832 2.83341 15.5832 5.66675V9.20841C15.5832 12.0417 14.1665 13.4584 11.3332 13.4584H10.979C10.7594 13.4584 10.5469 13.5647 10.4123 13.7417L9.34984 15.1584C8.88234 15.7817 8.11734 15.7817 7.64984 15.1584L6.58734 13.7417C6.474 13.5859 6.21192 13.4584 6.02067 13.4584Z" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.9585 5.66675H12.0418" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.9585 9.20825H9.2085" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <p class="menu_crm_item_name">Отзывы</p>
                            </a>
                        </div>   
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "slider"){echo " crm_link_active_podmenu";}?> " href="/admin/moduls/slider/"> 
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.25 11.6875H5.66667" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.4375 11.6875H10.2708" stroke="#444444" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                                <p class="menu_crm_item_name">Слайдер</p>
                            </a>
                        </div>                        
                                             
                    </div>
                </div>

                <div class="menu_crm_item">
                <a class="menu_crm_item_link <?php if($h["url"]["d_array"][2] == "user"){echo "crm_link_active";}?> "  >
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.7501 5.07175C12.7076 5.06467 12.6581 5.06467 12.6156 5.07175C11.6381 5.03633 10.8589 4.23592 10.8589 3.24425C10.8589 2.23133 11.6735 1.41675 12.6864 1.41675C13.6993 1.41675 14.5139 2.23842 14.5139 3.24425C14.5068 4.23592 13.7276 5.03633 12.7501 5.07175Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.0208 10.2285C12.9912 10.3914 14.0608 10.2214 14.8116 9.71853C15.8103 9.05269 15.8103 7.96186 14.8116 7.29603C14.0537 6.79311 12.9699 6.62311 11.9995 6.79311" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4.22859 5.07175C4.27109 5.06467 4.32068 5.06467 4.36318 5.07175C5.34068 5.03633 6.11984 4.23592 6.11984 3.24425C6.11984 2.23133 5.30526 1.41675 4.29234 1.41675C3.27943 1.41675 2.46484 2.23842 2.46484 3.24425C2.47193 4.23592 3.25109 5.03633 4.22859 5.07175Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4.95835 10.2285C3.98794 10.3914 2.91835 10.2214 2.16752 9.71853C1.16877 9.05269 1.16877 7.96186 2.16752 7.29603C2.92544 6.79311 4.00918 6.62311 4.9796 6.79311" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.49965 10.363C8.45715 10.3559 8.40756 10.3559 8.36506 10.363C7.38756 10.3276 6.6084 9.52718 6.6084 8.53551C6.6084 7.52259 7.42298 6.70801 8.4359 6.70801C9.44881 6.70801 10.2634 7.52968 10.2634 8.53551C10.2563 9.52718 9.47715 10.3347 8.49965 10.363Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.43852 12.5944C5.43977 13.2602 5.43977 14.351 6.43852 15.0169C7.57185 15.7748 9.42768 15.7748 10.561 15.0169C11.5598 14.351 11.5598 13.2602 10.561 12.5944C9.43477 11.8435 7.57185 11.8435 6.43852 12.5944Z" stroke="#2F6BF2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                        <p class="menu_crm_item_name">Пользователи</p>
                    </a>
                    <div id="myDropdown" class="menu_crm_podmenu">
                        <div class="menu_crm_podmenu_item">
                            <a class="menu_crm_podmenu_item_link <?php if($h["url"]["d_array"][3] == "registervalid"){echo " crm_link_active_podmenu";}?> " href="/admin/user/registervalid/"> 
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.2285 13.4937L11.3052 14.5703L13.4585 12.417" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.61334 7.69966C8.54251 7.69258 8.45751 7.69258 8.37959 7.69966C6.69376 7.643 5.35501 6.26175 5.35501 4.56175C5.34792 2.82633 6.75751 1.41675 8.49292 1.41675C10.2283 1.41675 11.6379 2.82633 11.6379 4.56175C11.6379 6.26175 10.2921 7.643 8.61334 7.69966Z" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.49307 15.4489C7.2039 15.4489 5.92182 15.123 4.94432 14.4714C3.23015 13.3239 3.23015 11.4539 4.94432 10.3134C6.89223 9.0101 10.0868 9.0101 12.0347 10.3134" stroke="#444444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                                <p class="menu_crm_item_name">Зарегестрированные</p>
                            </a>
                        </div>                        
                    </div>
                </div>
                <?php
/*
                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">
                        <img class="menu_crm_item_icon" src="/src/admin/img/stati.svg" alt="">
                        <p class="menu_crm_item_name">Статьи</p>
                    </a>
                </div>

                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">
                        <img class="menu_crm_item_icon" src="/src/admin/img/lending.svg" alt="">
                        <p class="menu_crm_item_name">Сервисы</p>
                    </a>
                </div>

                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">
                        <img class="menu_crm_item_icon" src="/src/admin/img/polzovateli.svg" alt="">
                        <p class="menu_crm_item_name">Пользователи</p>
                    </a>
                </div>

                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">
                        <img class="menu_crm_item_icon" src="/src/admin/img/zachita.svg" alt="">
                        <p class="menu_crm_item_name">Конструктор</p>
                    </a>
                </div>

                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">
                        <img class="menu_crm_item_icon" src="/src/admin/img/nastroyki.svg" alt="">
                        <p class="menu_crm_item_name">Настройка</p>
                    </a>
                </div>

                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">
                        <img class="menu_crm_item_icon" src="/src/admin/img/yvedomleniya.svg" alt="">
                        <p class="menu_crm_item_name">Уведомления</p>
                    </a>
                </div>
*/?>

</div>
            <div class="menu_crm_bottom">
                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">
                        <img class="menu_crm_item_icon" src="/src/admin/img/servisy.svg" alt="">
                        <p class="menu_crm_item_name">Справка</p>
                    </a>
                </div>

                <div class="menu_crm_item">
                    <a class="menu_crm_item_link" href="">
                        <img class="menu_crm_item_icon" src="/src/admin/img/yvedomleniya.svg" alt="">
                        <p class="menu_crm_item_name">Поддержка</p>
                    </a>
                </div>

                <div class="menu_crm_user">
                    <img src="/src/admin/img/avatar.png" alt="">
                    <div class="menu_crm_user_info">
                        <div class="menu_crm_user_info_name">[ADMIN] Алексей</div>
                        <a class="menu_crm_user_info_lk" href="">Выход</a>
                    </div>
                    <a class="exit" href=""> <br></a>
                </div>
            </div>
        </div>