# Desktop Revision

1. Profile Information
    - [x] Change “Name” to “First name” and make the “N” in last name lowercase.
    - [x] Full name entered on prior page pulls through to the first name field. Please add fields “First name” and “Last name” on the prior page.
    - [x] Error message under “Last name”, make “lastname” two words
    - [x] Consolidate “Area code” and “Phone number” into one field titled “Phone Number”. Input structure should be (###) ###-####. Automate the required format as users begin typing. Require users to enter 10 digits.
    - [x] Change “Address” to “Home Address”.
      - [x] Home Address field should allow street names to be entered.
      - [x] Change name of “Address 2” to “Apartment, suite, unit, etc. (optional)”. Remove error message.
      - [x] Change Zip code error message to “The zip code must be 5 digits”.
      - [x] Change “State/Province/Region” to “State”. Include a drop down menu list of abbreviated US states and reduce the field’s size.
    - [ ] Change background to the following pic (file attached).

2. Pet Profile
   - [x] Add the following title above the photo: “Pet Profile”.
   - [x] Remove the word “photo”.
   - [x] Change “Select a New Photo” to “Add Your Pup’s Photo!”.
   - [ ] Change background to the following pic. Blaine Bowers (HMG) can provide the original.
   
3. Registration — Welcome page
   - [ ] Since only clients should have access to login, please specify “Company Email”. We discussed granting access to only approved users based on their e-mail domain so as we gain clients I will allow access to approved domains.
   - [x] Change “I agree the Terms and Conditions” to “I agree to the Terms of Use and Privacy Policy”
   - [x] If users don’t select the “I agree” box, show an error message in red font such as “Please indicate that you have read and agree to the Terms of Use and Privacy Policy”.
   - [x] Terms of Use link.
   - [x] Privacy Policy link.
  
4. Contact Connected Canine
   - [x] Add period after “help”.
   - [x] After users complete the initial registration fields and click next, they should be sent to the following page: pet-profile.
   - [x] Remove the word “Photo” above the photo.

5. Pets—Behavior Background—Doggy Daycare
    - [x] Change every instance of “Doggie” to “Doggy”.
    - [x] Question #4—Capitalize “H” in “Has your dog ever...”.
  
6. Pets— Behavior Background—Separation And Confinemen
    - [x] Top of page should read “Separation And Confinement”.
    - [x] Error message for Q2. If a user fails to respond, the error message should read “ Your response is required.”.

7. Pets— Behavior Background—Aggression and Fear
   - [ ] Change icons showing the following behaviors Attaching the original file for reference. 
   - [x] Also, please try to maintain the image quality.
     **Se corrigio la proporcionalidad, pero la calidad de imagen viene dada por los recortes hechos.** 
   - [x] Change page title in upper left from “Aggression & Fear” to “Aggression And Fear”.

8. Pets— Vet & Medical
   - [x] Question prompt should read: “Does your dog currently have any of the following medical conditions? Check all that apply”
   - Add Medication
     - [x] Change title at top left to “Medicine”.
     - [x] Why are error messages showing?.
     - [x] In Frequency dropdown, add “Weekly".

9. Reservations
   - [x] Change title shown on page and in address bar from “Bookings” to “Reservations”.
   - [x] Should read “Choose your pet”.
   - [x] If user fails to select a pet, error message should read “Select Your Pet”.
   - [x] In instances when a user has only one pet, the pet should automatically be selected.
  
  # OTHER NOTES
- [x] Reword every instance of “Agreement” to “Terms of Use”


# ADMIN PLATFORM
- [x] Change landing page after login from *admin/home* to *admin/user*.
- [x] Reword “Users list” to *“Participants”* on *admin/user* view

# EMPLOYEE PLATFORM
- [ ] Consolidate content in “Insurance” tab under “User Profile”.
- [x] Move “User Profile” tab below “Pets”
- [ ] Add “Participants” tab below “User Profile. Users should be able to see which of their peers are also participating but they shouldn’t be able to access the pet’s profile. See below.
- [x] Add “Contact Us” below “Participants”. The “Contact Us” tab takes users to https://poc-connected-canine.herokuapp.com/messages
- [ ] Add icon to "Contact Us

# MOBILE VERSION
1. Admin Portal
   - [ ] Section: **Take Your Dog To Work**:  Not sure why I’m receiving an error message when trying to make a reservation using this profile.
   ** Deberia indicar las condiciones bajo las que se genero el error, no he podido reproducirlo, sin embargo me parece que es cuando se intenta hacer una reservacion de una mascota que ya tiene una pendiente**
2. Employee Portal
   - [ ] Section: **Pets-index**: Users should be able to clearly see the “edit” link here. Should show if a dog’s name is up to 10 characters.
   - [ ] Section: **Behavior Background**: Align “Occasionally” with selection bubble.
   - [ ] Change so “No” is not selected by default.
   - [ ] Please fix so it’s usable. Also, people correct the icons to match the behaviors as shown on the attached file as previously mention.



