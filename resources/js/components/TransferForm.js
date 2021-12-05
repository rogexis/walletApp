import React from "react";

const TransferForm = ({form, onChange, onSubmit}) => (

    <form className="form-inline justify-content-center"
        onSubmit={onSubmit}    
    >
        <div className="form-goup mb-2">
            <input
                type="text"
                className="form-control"
                placeholder="Description"
                name="concepto"
                value={form.concepto}
                onChange={onChange}
            />
        </div>
        <div className="input-group ms-sm-2 mb-2">
            <div className="input-group-prepend">
                <div className="input-group-text">$</div>
            </div>
            <input
                type="text"
                className="form-control"
                name="transaccion"
                value={form.transaccion}
                onChange={onChange}

            />
        </div>
        <button
            type="submit"
            className="btn btn-primary mb-2"
        >
            Add
        </button>

    </form>

)

export default TransferForm;