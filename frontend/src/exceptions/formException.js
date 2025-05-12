export class FormException extends Error {
    constructor(errors) {
        super("Validation failed");
        this.name = "FormException";
        this.errors = errors;
    }
}
