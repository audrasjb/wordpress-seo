/* External dependencies */
import { isEmpty } from "lodash";
import PropTypes from "prop-types";
import React from "react";

/* Yoast dependencies */
import CompanyInfoMissing from "./CompanyInfoMissing";

/**
 * Shows an alert when the company name or logo are empty.
 *
 * @constructor
 *
 * @param {Object} props The properties to use.
 *
 * @returns {React.Component} The Alert component.
 */
const CompanyInfoMissingOnboardingWizard = ( { properties, stepState } ) => {
	const isCompanyInfoMissing = isEmpty( stepState.fieldValues[ "publishing-entity" ].publishingEntityCompanyName ) ||
		isEmpty( stepState.fieldValues[ "publishing-entity" ].publishingEntityCompanyLogo );

	return isCompanyInfoMissing && <CompanyInfoMissing { ...properties } />;
};

CompanyInfoMissingOnboardingWizard.propTypes = {
	properties: PropTypes.shape( {
		message: PropTypes.string.isRequired,
		link: PropTypes.string.isRequired,
	} ).isRequired,
	stepState: PropTypes.shape( {
		fieldValues: PropTypes.shape( {
			"publishing-entity": PropTypes.shape( {
				publishingEntityCompanyName: PropTypes.string.isRequired,
				publishingEntityCompanyLogo: PropTypes.string.isRequired,
			} ),
		} ).isRequired,
	} ).isRequired,
};

export default CompanyInfoMissingOnboardingWizard;
