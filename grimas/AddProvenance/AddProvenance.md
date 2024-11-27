# AddProvenance - add provenance code to an item record
*Thanks to Aaron Krebeck for suggesting this grima!*

This grima adds the provenance code to the object of a specified barcode.

## Input
* Barcode - of item record to have provenance code added

## Output
This grima outputs a message indicating either:
* success - including the MMS ID of the new copy of the bib record
* error - including the error message from Alma

## API requirements
* Bibs - read/write
