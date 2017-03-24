<?php
/**
 * Created by PhpStorm.
 * User: tjDu
 * Date: 2017/3/24
 * Time: 10:09
 */
$pdo = new PDO('sqlite:/Users/czq/Development/Gofit/temp.db');
$statement = $pdo->prepare('select username from user');
$statement->execute();
$allUsers = $statement->fetchAll();
$mayBeDates = ['2016-10-31' , '2017-3-3', '2017-3-5', '2017-4-15', '2017-6-25'];
$mayBeCalories = ['2333.4', '23221.5','2332.5','5464.9','3412.8'];
$mayBeSteps = ['2300', '3500','4903','4587','3412'];
echo sizeof($allUsers);
for ($i=0 ; $i<sizeof($allUsers) ; $i++){
//    echo $allUsers[$i][0];
    $index = rand(0,4);
    $userName = $allUsers[$i][0];
    $query = "insert into sports_record VALUES ('$mayBeDates[$index]' , '$mayBeCalories[$index]', '$index','$mayBeCalories[$index]','$mayBeSteps[$index]', '$userName' , '$index')";
    $statement = $pdo->prepare($query);
    if (!$statement) {
        die("Execute query error, because: " . print_r($pdo->errorInfo(), true));
    }
    echo $statement->execute();
}




//for ($i = 0; $i < 100; $i++) {
//    $usernameNew = ['Liz Allen23', 'Donald J. Trumpasdf', 'Dan Scavino Jrsdf.' , 'Dr. Anne Schuchat','Dr. Nancy Messonnier', 'Dale Mantey', 'Austin'];
//
//    $username = "user" . $i;
//    $num = $i % 7;
//    $gender = $i%2 == 0 ? 'female' : 'male';
//    $birth = ['1970-3-23' , '1978-3-23' , '1975-1-23', '1977-5-25', '1992-2-23' , '1996-4-14', '1998-4-15'];
//    $location = ['Nanjing', 'London', 'Paris', 'Berlin', 'Tokyo', 'New Zealand','Nagoya'];
//    $interest = ['tennis', 'badminton', 'table tennis' , 'jogging', 'riding' , 'river boarding', 'skiing' , 'basketball'];
//    $motto = ['People who say Kanai Sensei is idiot/dumb or any othwr insult, must haven t been in love with someone so bad that they wanted to do EVERYTHING to make their loved one HAPPY! ' , 'People can change if hey meet with the right person.','Kanai Sensei is the one I look up to when I hear things related to Romance, and thats because he is a Romantic Person.'
//    , "Or just in love? Decide it for yourself, I give Kanai a hug for the effort he is doing for Akane","if weezy didn’t say some dumbass shit every once in a while yall would notice his wordplay"             ,
//    'In heraldry, a motto is often depicted below the shield in a banderole; this placement stems from the Middle Ages, in which the vast majority of nobles possessed a coat of arms and a motto. In the case of Scottish heraldry it is mandated to appear above the crest.','A canting motto is one that contains word play.[13] For example, the motto of the Earl of Onslow is Festina lente, punningly interpreting on-slow (liter
//    ally "make haste slowly").[14] Similarly, the motto of the Burgh of Tayport','In literature, a motto is a sentence, phrase, poem, or word prefixed to an essay, chapter, novel, or the like suggestive of its subject matter. It is a short, suggestive expression of a guiding principle for the written material that follows','but are expressed in writing and usually stem from long traditions of social foundations, or also from significant events, such as a civil war or a revolution. A motto may be in any language, but Latin has been widely used, especially in the Western world.'];
//    $path = "/view/img/users/user" . $num.".jpg";
////    $query = "update user set avatar='$path',gender='$gender',birth='$birth[$num]', location='$location[$num]',
////    interest='$interest[$num]', motto='$motto[$num]'  where username='$username';";
//    $query = "update user set username='$usernameNew[$num]' WHERE username='$username';";
//    echo $query;
//    $statement = $pdo->prepare($query);
//    if (!$statement) {
//        die("Execute query error, because: " . print_r($pdo->errorInfo(), true));
//    }
//    echo $statement->execute();
//
//
//}w = ['Liz Allen23', 'Donald J. Trumpasdf', 'Dan Scavino Jrsdf.' , 'Dr. Anne Schuchat','Dr. Nancy Messonnier', 'Dale Mantey', 'Austin'];
//
//    $username = "user" . $i;
//    $num = $i % 7;
//    $gender = $i%2 == 0 ? 'female' : 'male';
//    $birth = ['1970-3-23' , '1978-3-23' , '1975-1-23', '1977-5-25', '1992-2-23' , '1996-4-14', '1998-4-15'];
//    $location = ['Nanjing', 'London', 'Paris', 'Berlin', 'Tokyo', 'New Zealand','Nagoya'];
//    $interest = ['tennis', 'badminton', 'table tennis' , 'jogging', 'riding' , 'river boarding', 'skiing' , 'basketball'];
//    $motto = ['People who say Kanai Sensei is idiot/dumb or any othwr insult, must haven t been in love with someone so bad that they wanted to do EVERYTHING to make their loved one HAPPY! ' , 'People can change if hey meet with the right person.','Kanai Sensei is the one I look up to when I hear things related to Romance, and thats because he is a Romantic Person.'
//    , "Or just in love? Decide it for yourself, I give Kanai a hug for the effort he is doing for Akane","if weezy didn’t say some dumbass shit every once in a while yall would notice his wordplay"             ,
//    'In heraldry, a motto is often depicted below the shield in a banderole; this placement stems from the Middle Ages, in which the vast majority of nobles possessed a coat of arms and a motto. In the case of Scottish heraldry it is mandated to appear above the crest.','A canting motto is one that contains word play.[13] For example, the motto of the Earl of Onslow is Festina lente, punningly interpreting on-slow (liter
//    ally "make haste slowly").[14] Similarly, the motto of the Burgh of Tayport','In literature, a motto is a sentence, phrase, poem, or word prefixed to an essay, chapter, novel, or the like suggestive of its subject matter. It is a short, suggestive expression of a guiding principle for the written material that follows','but are expressed in writing and usually stem from long traditions of social foundations, or also from significant events, such as a civil war or a revolution. A motto may be in any language, but Latin has been widely used, especially in the Western world.'];
//    $path = "/view/img/users/user" . $num.".jpg";
////    $query = "update user set avatar='$path',gender='$gender',birth='$birth[$num]', location='$location[$num]',
////    interest='$interest[$num]', motto='$motto[$num]'  where username='$username';";
//    $query = "update user set username='$usernameNew[$num]' WHERE username='$username';";
//    echo $query;
//    $statement = $pdo->prepare($query);
//    if (!$statement) {
//        die("Execute query error, because: " . print_r($pdo->errorInfo(), true));
//    }
//    echo $statement->execute();
//
//
//}
