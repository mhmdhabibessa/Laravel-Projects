<style>
    * {
        font-family: DejaVu Sans, sans-serif;
        direction: rtl;
    }
    body {
        font-family: Helvetica, serif;
        font-weight: normal;
    }
    .bg-dark {
        background: #212529;
        width: 100%;
        height: 2cm;
    }
    .bg-dark > img {
        display: block;
        margin: 0 auto;
        padding: 0.25cm;
    }
    h2 {
        margin-bottom: 0;
    }
    .text-dark {
        color: #212529;
    }
    .text-gold {
        color: #eab220;
    }
    .page-break {
        page-break-after: always;
    }
    /**
        Set the margins of the page to 0, so the footer and the header
        can be of the full height and width !
     **/
    @page {
        margin: 0 0;
    }
    /** Define now the real margins of every page in the PDF **/
    body {
        margin: 2.35cm 0.75cm;
        color: #212529;
    }
    /** Define the header rules **/
    header {
        width: 100%;
        position: fixed;
        height: 2cm;
    }
    .mx-auto {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    /** Define the footer rules **/
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2.5cm;
    }
    footer > p {
        font-size: 11px;
    }
    table, td {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 10px;
    }
    table.bordered-table td, .border-b-1 {
        border-bottom: 1px solid #212529;
    }
    .mt-1 {
        margin-top: 1cm;
    }
    .text-xs {
        font-size: 12px;
    }
    .text-center {
        text-align: center;
    }
    .footer-text {
        text-align: center;
        font-size: 12px;
        color: #3c4b5f;
    }
    .text-underline {
        text-decoration: underline;
    }
    .mx-1 {
        margin: 0 1cm;
    }
    .block {
        display: block;
    }
    .bg-dark-grey {
        background: #949494;
    }
    .bg-light-grey {
        background: #EDF2F7;
    }
    .mb-2 {
        margin-bottom: 2rem;
    }
    .mt-2 {
        margin-top: 2rem;
    }
    .py-2 {
        padding: 2rem 0;
    }
    .text-center {
        text-align: center;
    }
    .text-right {
        text-align: right;
    }
</style>
