<?php

echo 'test with interactive shell (variables in ~/.bashrc)';

$r=`bash -ic 'echo \$JAVA_HOME; which java; javac /Accounts/turing/students/s22/ojhadi01/public_html/NextGenerationCourseRegistration/registrarPages/AI/*.java 2>&1'`;
$r=`bash -ic 'echo \$JAVA_HOME; which java; java -cp /Accounts/turing/students/s22/ojhadi01/public_html/NextGenerationCourseRegistration/registrarPages/AI/ DataProcess 2>&1'`;
echo "<pre>$r</pre>";

?>