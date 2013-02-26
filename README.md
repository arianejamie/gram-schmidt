gram-schmidt
============

<h3>Gram-Schmidt Program</h3>

My program is written as PHP class to be processed by a web server. It can be included on any HTML page by instantiating the GramSchmidt object and printing the result of the getOrthnormalizedSet() method on an a basis written as an array of two vectors of any size (see example below). Vectors values are written as comma-separated strings. My program is based on the dot product.

<hr />

<code>
<?php  print_r( $gs->getOrthnormalizedSet( array('0,1,0','1,1,1') ) ); ?><br />
</code>

Array ( [0] => 0,1,0 [1] => 0.707106781187,0,0.707106781187 )

<hr />

Each function is accompanied by a heading comment naming and describing its purpose. Five protected functions defining of simple vector calculations: _getDotProduct() and _getDifference returns the dot products and differences of two vectors of any size, _getNorm() returns the product of any size vector and a single scalar, _getScalarProduct and getScalarQuotient operate on two any size vectors. The above methods are used in the three public methods which make up the process itself: _getOrthogonal which converts basis to orthogonal basis, _getNormalized which normalizes and _getOrthonormalizedSet which carries out both functions in one step. See code and method headings for more details.
