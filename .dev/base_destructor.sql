revoke all on administrateur from agence_backoffice_service;
revoke all on client from agence_backoffice_service;
revoke all on habitation from agence_backoffice_service;
revoke all on habitationdefectueux from agence_backoffice_service;
revoke all on historiqueloyer from agence_backoffice_service;
revoke all on photohabitation from agence_backoffice_service;
revoke all on quartier from agence_backoffice_service;
revoke all on reservation from agence_backoffice_service;
revoke all on typehabitation from agence_backoffice_service;

revoke all on administrateur from agence_frontoffice_service;
revoke all on client from agence_frontoffice_service;
revoke all on habitation from agence_frontoffice_service;
revoke all on habitationdefectueux from agence_frontoffice_service;
revoke all on historiqueloyer from agence_frontoffice_service;
revoke all on photohabitation from agence_frontoffice_service;
revoke all on quartier from agence_frontoffice_service;
revoke all on reservation from agence_frontoffice_service;
revoke all on typehabitation from agence_frontoffice_service;

revoke all privileges on database agence_immo from agence_backoffice_service;
revoke all privileges on database agence_immo from agence_frontoffice_service;


drop user agence_frontoffice_service;
drop user agence_backoffice_service;
drop database agence_immo;
