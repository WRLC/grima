# AddInternalNote3 - add an internal note 3 to an item record
*Thanks to Aaron Krebeck for suggesting this grima!*

This grima sets Internal Note 3 to the specified note. If no
note is entered into the form, any existing Internal Note 3
field will be cleared. This grima previously appended notes of this
type to internal note 2, but that field has been claimed for retention
status.

## Input
* Internal Note 3 - Text of note to add to item record
* Barcode - of item record to have internal note added

## Output
This grima outputs a message indicating either:
* success - including the MMS ID of the new copy of the bib record
* error - including the error message from Alma

Internal Note 3 is a persistent field, so will appear in the form
even after it successfully runs. This makes it easier to add the
same note to many items in succession.

## API requirements
* Bibs - read/write
