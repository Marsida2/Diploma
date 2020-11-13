<?php
require 'connection.php';

$obj_forumManager=new ForumManager($connection, $_SESSION['id_perdorues'], $_SESSION['kodLende']);


sleep(1);
function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest';
    }

    $kodLende=$_GET['kodLende'];
    $lastPostId=(int)$_GET['lastPostId'];

    //marrim nga databaza postet e reja
    $query = "SELECT * FROM post WHERE kod_lende='$kodLende' AND id_post<$lastPostId ORDER BY id_post DESC LIMIT 2";
    $result=mysqli_query($connection,$query);
    $result_array=[];
    //vektori i posteve
    while($row=mysqli_fetch_assoc($result))
        $result_array[]=new Post($row);
    $nr=count($result_array);

    if($nr==0){
        echo "";
        exit;
    } 
    //printimi i posteve ne forme text
    else{
        for($i=0; $i<$nr; $i++){
            $post=$result_array[$i];
        ?>
                <div class=postim>
                    <div class='posti' >  
                        <p class='titullPosti'><?php echo $post->getTitulli(); ?></p>
                        <p class='postues'><span class='paraPostues'>Nga: </span><?php echo $obj_forumManager->getFullName($post->getPostues());?>
                        <span class='date'><?php echo $post->getFormatedData(); ?></span></p>
                        <p class='permbajtjePosti'><?php echo $post->getPermbajtja(); ?></p>
                        <?php if($post->kaFoto()) { ?>
                            <p><a href='foto/poste/<?php echo $post->getUpload(); ?>'><img class='fotoPosti' src='foto/poste/<?php echo $post->getUpload(); ?>' alt='Problem ne hapjen e fotos' style='max-width: 500px; max-height: 300px; margin:5px auto;'></p></a>
                        <?php } ?>
                    </div><!-- mbyllet div Posti -->
                    <hr>
<!--  fundi i seksionit te postit fillimi i seksionit te komenteve --> 
                    <div class='komentet fshih' id="<?php echo $post->getIdPost(); ?>">

                        <?php
                                $komentet=$obj_forumManager->getKomentet($post->getIdPost());
                                if(count($komentet)==0)
                                    echo "<p><em>Asnjë koment në këtë post</em></p>";
                                for($j=0; $j<count($komentet); $j++){
                                    $komenti=$komentet[$j];
                        ?>
                            <div class='komenti'>
                                <p>
                                    <?php echo $komenti->getPermbajtja() ?>
                                </p>
                                <p class='postues'>
                                <?php echo $obj_forumManager->getFullName($komenti->getIdPostues()); ?>
                                    <span class='date'>
                                        <?php echo $komenti->getFormatedData(); ?>
                                    </span>
                                </p>
                            </div>
                            <?php } ?>              
                        </div><!-- mbyllet div i komenteve  -->

                    <!--    ketu do vendoset forma qe zmadhon postin -->
                    <form action='post.php' method='get' class='formClass butonat'>
                    <p>
                        <input type='text' name='id_post' value='<?php echo $post->getIdPost(); ?>' hidden>

                        <button type='button' class='btnShto lejla' name='<?php echo $post->getIdPost(); ?>' onclick="shfaqGjitheKomentet(this)"><i class='fa fa-plus-square fa-lg'></i> Lexo komentet
                        </button><!-- nga hide ne shfaq -->
                        <button type='submit' class='btnShto lejla' name='hapPost'><i class='fa fa-expand'></i> Shiko postin e plotë
                        </button>
                    </p>
                </form>

        </div><!-- mbyllet div i postim -->

    <?php 
        }
    }
     ?>