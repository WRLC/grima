# AddInternalNote2 - add an internal note 2 to an item record
*Thanks to Aaron Krebeck for suggesting this grima!*

This grima sets Internal Note 2 to the specified note. If no
note is entered into the form, any existing Internal Note 2
field will be cleared.

## Input
* Internal Note 2 - Text of note to add to item record
* Barcode - of item record to have internal note added

## Output
This grima outputs a message indicating either:
* success - including the MMS ID of the new copy of the bib record
* error - including the error message from Alma

Internal Note 2 is a persistent field, so will appear in the form
even after it successfully runs. This makes it easier to add the
same note to many items in succession.

## API requirements
* Bibs - read/write
