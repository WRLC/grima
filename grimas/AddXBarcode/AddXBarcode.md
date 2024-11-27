# AddInternalNote - add an internal note to an item record
*Thanks to Aaron Krebeck for suggesting this grima!*

This grima adds an X to the object's barcode.

## Input
* Barcode - of item record to have internal note added

## Output
This grima outputs a message indicating either:
* success - including the MMS ID of the new copy of the bib record
* error - including the error message from Alma

## API requirements
* Bibs - read/write
