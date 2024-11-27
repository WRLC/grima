# AddSCFMsg - add an internal SCF message to an item record

This grima allows the user to choose a note field and choose from a
limited list of approved terms. Do not use this on items that already
have row/tray information.

## Input
* Internal Note 1 - Text of note to add to item record
* Barcode - of item record to have internal note added

## Output
This grima outputs a message indicating either:
* success - including the MMS ID of the new copy of the bib record
* error - including the error message from Alma

Internal Note 1 is a persistent field, so will appear in the form
even after it successfully runs. This makes it easier to add the
same note to many items in succession.

## API requirements
* Bibs - read/write