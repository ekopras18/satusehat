# Satusehat Integration
SATUSEHAT menggunakan HL7 FHIR dalam pengimplementasian standar data model dan Application Programming Interface (API).

Fast Healthcare Interoperability Resources FHIR adalah sebuah standar global (internasional) yang menetapkan format data beserta elemen-elemennya (yang disebut "resources") dan sebuah standar antarmuka pemrograman aplikasi (API/Application Programming Interface) untuk pertukaran informasi (interoperabilitas SATUSEHAT) yang pada penerapannya akan dibagi-bagi lagi menjadi beberapa alur proses sesuai penggunaannya (use case) baik use case dasar maupun use case tematik. FHIR dibaca “fire” dalam bahasa Inggris (/faier/).

<i>[Source](https://satusehat.kemkes.go.id/platform/docs/id/fhir/)</i>

## Resources FHIR

1. O-Auth2
   - [x] OAuth2 (Generate Token)
2. Resources - Onboarding
   - [ ] Organization
   - [ ] Location
   - [ ] Practitioner
   - [ ] Patient
3. Resources - Interoperability
   - [ ] Encounter
   - [ ] Account
   - [ ] AllergyIntolerance
   - [ ] CarePlan
   - [ ] ChargeItem
   - [ ] Claim
   - [ ] ClaimResponse
   - [ ] ClinicalImpression
   - [ ] Composition
   - [ ] Condition
   - [ ] Coverage
   - [ ] CoverageEligibilityRequest
   - [ ] CoverageEligibilityResponse
   - [ ] DiagnosticReport
   - [ ] EpisodeOfCare
   - [ ] FamilyMemberHistory
   - [ ] ImagingStudy
   - [ ] Immunization
   - [ ] Invoice
   - [ ] Medication
   - [ ] MedicationDispense
   - [ ] MedicationRequest
   - [ ] MedicationStatement
   - [ ] Observation
   - [ ] Procedure
   - [ ] QuestionnaireResponse
   - [ ] RelatedPerson
   - [ ] ServiceRequest
   - [ ] Specimen

## Installation

1. Install package via composer

   ```bash
   composer require ekopras18/satusehat
   ```
2. Publish the configuration file & migration file

   ```bash
   php artisan vendor:publish --provider="Ekopras18\Satusehat\SatusehatServiceProvider" --tag=satusehat
   ```
3. Set the configuration in `.env` file. example `.env.example`

   ```env
   SATUSEHAT_ENV=development|staging|production
   SATUSEHAT_CLIENT_ID=CWdRq...............
   SATUSEHAT_CLIENT_SECRET=vRTWTnAN...............
   SATUSEHAT_ORGANIZATION_ID=5990777e-...............
   SATUSEHAT_ORGANIZATION_NAME="RSUD X"
   ```
4. Migrate the table

   ```bash
   php artisan migrate
   ```
5. Done

## Usage
   