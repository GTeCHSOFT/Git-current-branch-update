# Git-current-branch-update
get the current branch and make pull PHP class

![Screenshot](screenshot.PNG)

```php
$git = new Git;

echo $git->Branch();
// will show cuurent branch

echo $git->Version();
// will show git version

$git->Fetch();
$res = $git->Git_Count();
// will get array() with count of in and out commit not applied

$pu =  $git->Pull();
echo json_encode(array('pumsg' =>$pu ));
// Pull and show result
```
