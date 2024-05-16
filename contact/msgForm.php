

<div class="FormLeftSIde">
         <div class="FormLogoSite"onclick="backhome()">
               <div class="Logo" >
                   <img src="../images/logo-login.png" />
               </div>
         </div>
         <div class="creatMessage">
              <button class="ShoxwMessageForm" onclick="showmsg()">Nouveau message</button>
         </div>

         <div class="Sections">
             <div class="SectionListen">
                <ul>
                     <li onclick="showallmsg1()">Tout les message</li>
                    <li onclick="showallmsg()">Messages a venir</li>
                    <li onclick="mymsg()">Messages envoye </li>

                </ul>
             </div>


         </div>

    </div>
<!-- ///////////////////////////-->


    <div class="FormRightSIde">
        <!---------->
        <div class="firstHead">
             <div class="Searchform">
                 <input type="text" name="search" placeholder="Rechercher message par titre" id="search" />
                 <button onclick="searchmsg()"><img  src="https://img.icons8.com/ios-glyphs/30/FFFFFF/search--v1.png" /></button>
             </div>

             <div class="UserInfo">
                   <div class="nameUser">
                    
                   </div>

                   <div class="userimg">
                      <img id="userimg" src="" />
                   </div>
             </div>
        </div>
        <!------------------>

        <div class="SendMessageForm">
              <div class="title">
              Envoyer un nouveau message :
              </div>

              <div class="titleMessage">
                <input type="text" id="msgtitle" name="title" class="InputMessage" placeholder="titre" />
              </div>

              <div class="messageBody">
                   <textarea id="Msgcontent" name="content" class="messageArea" placeholder="message"></textarea>
              </div>
              <div class="MessageSendFooter">
                 <button class="SendButtonF" id="sendmsg">envoyer</button>
              </div>
              <div class="alert alert-success" id="msgsendsucc">
                       <strong>Succes!</strong> votre message a bien été envoyé.
              </div>
              <div class="alert alert-warning" id="msgsenderror">
                       <strong>Erreur!</strong> nous n'avons pas pu envoyer votre message réessayez!
              </div>
        </div>
        <!-------------------------------->
        <div class="MessAgeFORMsHOX">
          <div class="fMsg">
            <div class="USERinfoIMGE">
                <img id="photoProfile" src="" />
            </div>
            <div class="messageStitle">
               <div class="userinfo_info">
                    <span id="msgUserAJAX"></span>
                    <span id="datemsgUserAJAX"></span>
                </div>
                 <div class="MessageTileS" id="msgtitleAJAX"></div>
                
            </div>
            <div class="messageOption">
                <input type="number" id="id_topic" class="hide_id" value="">
            </div>
         </div>
         <!---------------------------->
          <div class="bdyMESG"></div>
        </div>
        <div class="deleteMsg">
        <div class="alert alert-success" >
                       <strong>Success!</strong>your message has been deleted ! .
              </div>          
        </div>
        <!---------------------------->

        
        <div class="mymsg">
          <?php mymsg($connection ,$_SESSION['id']) ;?>    
        </div>
     <!-------------------------------->

        <div class="allmesages">
           

        <div class="showallrecive">
            <?php showallrecive($connection ) ;?>  
                 
            </div>
        <!-------------------------------->

            <div class="showallMessages" id="showallMessages">
            <?php showallMessages($connection ) ;?>  
                 
            </div>
         </div>
     <!-------------------------------->
            <div id="searchMessages">
                
                 
            </div>

       






    </div>

    <script src="../js/send_msg.js"></script>
    