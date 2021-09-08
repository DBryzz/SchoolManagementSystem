<?php
session_start();
if(isset($_SESSION['user_id'])) {	
	$error_msg="";
	$session_id = $_SESSION['user_id'];
	$session_name = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/Projects/SchoolManagementSystem/common/"; include($IPATH."dashboard.php"); ?>

    <section class="grid">
        <section class="grid">
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus expedita vel architecto, alias nam,
                repellendus eius eligendi, aspernatur et aliquid sit maiores esse eveniet? Nihil officia magnam
                perspiciatis asperiores facilis.</article>
            <article>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus veniam, officiis saepe tempora
                esse aliquid aut, ducimus excepturi nemo nisi laborum suscipit sed voluptate nesciunt. Quas tenetur
                corrupti nostrum eos!</article>
            <article>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium, quia nobis at veniam dolor
                vel sequi non officiis laborum, sed alias aperiam quaerat iure. Odit alias libero nulla facilis ad!
            </article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, perferendis at praesentium nisi
                laudantium soluta, ad cumque rerum nam aut eveniet omnis delectus quos accusantium modi illo sequi?
                Maiores, illo.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto cupiditate laborum voluptates
                praesentium esse ipsam excepturi omnis minus nesciunt, dolorem magnam asperiores nulla molestiae
                necessitatibus repellendus beatae tempora inventore! Deleniti.</article>
            <article>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis amet rem, quam voluptate
                maiores doloremque exercitationem eos vero magni asperiores dolorum eaque praesentium sint voluptatem
                ullam consectetur unde maxime provident.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, nihil itaque, animi voluptate
                voluptatibus obcaecati facilis culpa iure magnam error nobis natus labore assumenda quaerat. Aperiam
                blanditiis mollitia placeat quibusdam.</article>
            <article>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos provident architecto explicabo
                sit, corporis excepturi ipsa id! Esse voluptas libero doloribus accusantium, obcaecati repellendus neque
                vitae eius, amet nesciunt alias.</article>
        </section>
    </section>

    <footer class="page-footer">
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/Projects/SchoolManagementSystem/common/"; include($IPATH."footer.html"); ?>

    </footer>
    </section>

    <script src="/Projects/SchoolManagementSystem/js/dashboard.js"></script>

    </body>
<?php } ?>
</html>