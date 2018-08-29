
<div class="row">
     <div class="col-lg-12">
        <h1 class="page-header">
             Welcome To Dashboard
            <small></small>
         </h1>
        <?php
          /*

            // $sql="select * from users where id=1";
           $user=new User();
           $result_set=$user->find_all_users();
            while($row=mysqli_fetch_array($result_set)){
                echo $row['username']."<br>";
            }
            */
            // new way to acess the data using static method
           /* $result_set=User::find_all_users();
            while($row=mysqli_fetch_array($result_set)){
                echo $row['username']."<br>";
            }

            $found_user=User::find_user_by_id(2);
            $user=User::instantation($found_user);
            echo $user->username;  */

            /*$users=User::find_all_users();
            foreach($users as $user_info){
                //echo $user_info['username'];
                echo $user_info->username;
            }
            $pictures=new picture();*/

               /* $user=new User();
               $user->username="edwin";
               $user->password="password";
               $user->first_name="edwin";
               $user->last_name="diaz";
               $user->save(); */

             /* $user= User::find_user_by_id(10);
            $user->last_name="sonawane";
            $user->update(); */
            //$user->delete();

            $photo=Photo::find_by_id(5);
            echo $photo->title."<br>";
            echo $photo->filename;
            /*
            $user->first_name="piyu";
            $user->password="piyush";
            $user->last_name="sonawane";

            $user->save(); */

            /*$user= new User();
            $user->username="maria";
            $user->save();*/
           /*  $users=User::find_all();
           // print_r($users);
            foreach ($users as $user) {
                echo $user->username."<br>";
            } */
           /*  $photos=Photo::find_all();
            //print_r($photos);
            foreach ($photos as $photo) {
                echo $photo->title."<br>";
            } */
           /*  $photo= new Photo;
            $photo->title="chetan";
            $photo->save(); */
               /* $photo=new Photo();
               $photo->title="just a cheak tiltle";
               $photo->size=85;

               $photo->create(); */
        ?>
    </div>
</div>
